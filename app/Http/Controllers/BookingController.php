<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Stripe\Refund;
use Stripe\StripeClient;

class BookingController extends Controller
{
    public function index(){
        $userId = auth()->id();
        $bookings = Booking::with(['trip.origincity', 'trip.destinationcity'])
            ->where('passenger_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('bookings.index', compact('bookings'));
    }
    public function myTripsBookings(){
        $bookings = Booking::whereHas('trip', function ($query) {
            $query->where('driver_id', Auth::id());
        })
            ->with(['trip.originCity', 'trip.destinationCity', 'passenger'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('bookings.myTripsBookings', compact('bookings'));
    }

    public function reserve(Request $request){
        $trip = Trip::findOrFail($request->trip_id);
        $booking = Booking::create([
            'trip_id' => $request->trip_id,
            'passenger_id' => auth()->id(), 
            'seats_booked' => $request->seats_booked, 
            'status' => 'reserved', 
            'total_price' => $trip->price * $request->seats_booked, 
        ]);
        return redirect()->route('bookings.show', ['id' => $booking->id])->with('bookings', $booking);
    }
    

    public function show($id){
        $booking = Booking::with(['trip', 'passenger'])->find($id);
        if (!$booking) {
            return redirect()->route('bookings.index')->with('error', 'Booking not found');
        }
        $trip = Trip::find($booking->trip_id);

        if (!$trip) {
            return redirect()->route('trips.index')->with('error', 'Trip not found');
        }

        return view('bookings.show', compact('booking', 'trip'));
    }

    public function store(Request $request){

        if (!auth()->user()->email_verified_at && !auth()->user()->google_id) {
            return redirect('/trips')->with([
                'error' => 'Your email address is not verified. Please verify your email before booking a trip.',
            ]);
        }

        $tripi = Trip::find(request('trip_id'));

        // Check for overlapping bookings for the same passenger
        $hasBooking = Booking::where('passenger_id', request('passenger_id'))
            ->whereHas('trip', function ($query) use ($tripi) {
                $query->where('departure_time', '<', $tripi->arrival_time)
                    ->where('arrival_time', '>', $tripi->departure_time);
            })->exists();

        if ($hasBooking) {
            return redirect('/trips')->with([
                'error' => 'You already have a booking during this time.',
            ]);
        }
        $hasTrip = Trip::where('driver_id', request('passenger_id'))
            ->where('departure_time', '<', $tripi->arrival_time)
            ->where('arrival_time', '>', $tripi->departure_time)
            ->exists();

        if ($hasTrip) {
            return redirect('/trips')->with([
                'error' => 'You are driving another trip during this time.',
            ]);
        }

        $stripe = new StripeClient(config('services.stripe.secret'));

        $trip = Trip::findOrFail($request->trip_id);
        $lineItems = [
            [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => ['name' => "Trip from {$trip->origincity->name} to {$trip->destinationcity->name}"],
                    'unit_amount' => $trip->price * 100,
                ],
                'quantity' => $request->seats_booked,
            ]
        ];

        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('bookings.success', [], true) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('bookings.cancel', [], true),
        ]);
        $seats_booked =  $request->seats_booked;
        $booking = Booking::create([
            'trip_id' => $trip->id,
            'passenger_id' => auth()->id(),
            'seats_booked' => $request->seats_booked,
            'status' => 'unpaid',
            'total_price' => $trip->price * $request->seats_booked,
            'session_id' => $session->id,
        ]);

        return redirect($session->url);
    }

    public function success(Request $request){
        $stripe = new StripeClient(config('services.stripe.secret'));
        $sessionId = $request->get('session_id');

        try {
            $session = $stripe->checkout->sessions->retrieve($sessionId);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return redirect()->route('bookings.index')->with('error', 'Error retrieving session: ' . $e->getMessage());
        }

        $booking = Booking::where('session_id', $sessionId)->where('status', 'unpaid')->first();

        if (!$booking) {
            throw new NotFoundHttpException('Booking not found.');
        }

        if (empty($session->payment_intent)) {
            return redirect()->route('bookings.index')->with('error', 'No payment intent found for this session.');
        }

        $paymentIntentId = $session->payment_intent;

        $booking->status = 'paid';
        $booking->stripe_charge_id = $paymentIntentId;
        $booking->save();

        return view('bookings.checkout-success', compact('booking'));
    }
    public function cancel(){
        return redirect()->route('home')->with('error', 'Payment was canceled.');
    }
    public function refund($bookingId){
        $booking = Booking::findOrFail($bookingId);
        $departureTime = $booking->trip->departure_time;
        if (now()->greaterThanOrEqualTo($departureTime)) {
            return redirect()->back()->with('error', 'Refund failed: The trip has already departed.');
        }
        $paymentIntentId = $booking->stripe_charge_id;
        if (empty($paymentIntentId)) {
            return redirect()->back()->with('error', 'Refund failed: No PaymentIntent ID found for this booking.');
        }
        $stripe = new StripeClient(config('services.stripe.secret'));
        try {
            $refund = $stripe->refunds->create([
                'payment_intent' => $paymentIntentId,
            ]);
            $booking->update(['status' => 'refunded']);
            return redirect('/bookings')->with('status', 'Booking canceled and refunded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Refund failed: ' . $e->getMessage());
        }
    }

    public function webhook(){
        $endpoint_secret = env('STRIPE_WWEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response('', 400);
        }

        switch ($event->type) {
            case 'payment_intent.succeeded':
                $session = $event->data->object;
                $sessionId = $session->id;
                $booking = Booking::where('session_id', $sessionId)->where('status', 'unpaid')->first();
                if (!$booking) {
                    throw new NotFoundHttpException();
                }
                $booking->status = 'paid';
                $booking->save();
                break;
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('', 200);
    }

    public function destroy($id){
        $booking = Booking::find($id);
        $booking->delete();

        return redirect('/trips')->with('success', 'Booking deleted successfully');
    }
}
