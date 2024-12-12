<?php

namespace App\Http\Controllers;

use App\Events\Notifications;
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
    public function transactions(Request $request){
        $query = Booking::with(['trip.origincity', 'trip.destinationcity', 'passenger']);
        if ($request->has('date_from') && $request->has('date_to')) {
            if ($request->input('date_from') && $request->input('date_to')) {
                $query->whereBetween('created_at', [$request->input('date_from'), $request->input('date_to')]);
            }
        }
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        if ($request->has('min_amount') && is_numeric($request->input('min_amount'))) {
            $query->where('total_price', '>=', $request->input('min_amount'));
        }
        if ($request->has('max_amount') && is_numeric($request->input('max_amount'))) {
            $query->where('total_price', '<=', $request->input('max_amount'));
        }
        $transactions = $query->get();
        return view('superadmin.transactions.index', compact('transactions'));
    }

    public function myTransactions(Request $request){
        $userId = auth()->id();
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');
        $status = $request->input('status');
        $minAmount = $request->input('min_amount');
        $maxAmount = $request->input('max_amount');
        $moneySent = Booking::where('passenger_id', $userId)
                    ->with(['trip.origincity', 'trip.destinationcity', 'passenger'])
                    ->when($dateFrom, fn($query) => $query->whereDate('created_at', '>=', $dateFrom))
                    ->when($dateTo, fn($query) => $query->whereDate('created_at', '<=', $dateTo))
                    ->when($status, fn($query) => $query->where('status', $status))
                    ->when($minAmount, fn($query) => $query->where('total_price', '>=', $minAmount))
                    ->when($maxAmount, fn($query) => $query->where('total_price', '<=', $maxAmount))
                    ->get();

        $moneyReceived = Booking::whereHas('trip', function ($query) use ($userId) {
            $query->where('driver_id', $userId);
        })
                    ->with(['trip.origincity', 'trip.destinationcity', 'passenger'])
                    ->when($dateFrom, fn($query) => $query->whereDate('created_at', '>=', $dateFrom))
                    ->when($dateTo, fn($query) => $query->whereDate('created_at', '<=', $dateTo))
                    ->when($status, fn($query) => $query->where('status', $status))
                    ->when($minAmount, fn($query) => $query->where('total_price', '>=', $minAmount))
                    ->when($maxAmount, fn($query) => $query->where('total_price', '<=', $maxAmount))
                    ->get();

        return view('bookings.mytransactions', compact('moneySent', 'moneyReceived'));
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
        $reserveDetails = [
            'originCity' => $trip->origincity->name,
            'destinationCity' => $trip->destinationcity->name,
            'seatsBooked' => $request->seats_booked,
            'totalPrice' => $trip->price * $request->seats_booked,
            'bookingId' => $request->id,
        ];
        $message = __('messages.You have reserved a trip from'). $reserveDetails['originCity'] .__('messages.to'). $reserveDetails['destinationCity'] .__('messages.with'). $reserveDetails['seatsBooked'] . __('messages.seats reserved.');

        event(new Notifications($message , auth()->id(), $reserveDetails));

        $driver = $trip->driver_id;

        $drivermessage = __('messages.You have a new reservation from'). auth()->user()->name;

        event(new Notifications($drivermessage , $driver));

        return redirect()->route('bookings.show', ['id' => $booking->id])->with('bookings', $booking);
    }


    public function show($id){
        $booking = Booking::with(['trip', 'passenger'])->find($id);
        if (!$booking) {
            return redirect()->route('bookings.index')->with('error', __('messages.Booking not found'));
        }
        $trip = Trip::find($booking->trip_id);

        if (!$trip) {
            return redirect()->route('trips.index')->with('error', __('messages.Trip not found'));
        }

        return view('bookings.show', compact('booking', 'trip'));
    }

    public function store(Request $request){

        if (!auth()->user()->email_verified_at && !auth()->user()->google_id) {
            return redirect('/trips')->with([
                'error' => __('messages.Booking Failed'),
                'description' => __('messages.Your email address is not verified. Please verify your email before booking a trip.'),
            ]);
        }

        $tripi = Trip::find(request('trip_id'));

        // Check for overlapping bookings for the same passenger
        $hasBooking = Booking::where('passenger_id', request('passenger_id'))
            ->where('status', '!=', 'refunded')
            ->whereHas('trip', function ($query) use ($tripi) {
                $query->where('departure_time', '<', $tripi->arrival_time)
                    ->where('arrival_time', '>', $tripi->departure_time);
            })->exists();

        if ($hasBooking) {
            return redirect('/trips')->with([
                'error' => __('messages.Booking Failed'),
                'description' => __('messages.You already have a booking during this time.'),
            ]);
        }
        $hasTrip = Trip::where('driver_id', request('passenger_id'))
            ->where('departure_time', '<', $tripi->arrival_time)
            ->where('arrival_time', '>', $tripi->departure_time)

            ->exists();

        if ($hasTrip) {
            return redirect('/trips')->with([
                'error' => __('messages.Booking Failed'),
                'description' => __('messages.You are driving another trip during this time.'),
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
        $bookingDetails = [
            'originCity' => $trip->origincity->name,
            'destinationCity' => $trip->destinationcity->name,
            'seatsBooked' => $request->seats_booked,
            'totalPrice' => $trip->price * $request->seats_booked,
            'bookingId' => $request->id,
        ];
        $message = __('messages.You have booked a trip from'). $bookingDetails['originCity'] .__('messages.to'). $bookingDetails['destinationCity'] .__('messages.with'). $bookingDetails['seatsBooked'] .__('messages.seats booked. Total price:'). $bookingDetails['totalPrice']. '€';

        event(new Notifications($message , auth()->id(), $bookingDetails));

        $driver = $trip->driver_id;

        $drivermessage = __('messages.You have a new booking from'). auth()->user()->name;

        event(new Notifications($drivermessage , $driver));

        return redirect($session->url);
    }

    public function success(Request $request){
        $stripe = new StripeClient(config('services.stripe.secret'));
        $sessionId = $request->get('session_id');

        try {
            $session = $stripe->checkout->sessions->retrieve($sessionId);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return redirect()->route('bookings.index')->with('error', __('messages.Error retrieving session:'). $e->getMessage());
        }

        $booking = Booking::where('session_id', $sessionId)->where('status', 'unpaid')->first();

        if (!$booking) {
            throw new NotFoundHttpException(__('messages.Booking not found'));
        }

        if (empty($session->payment_intent)) {
            return redirect()->route('bookings.index')->with('error', __('messages.No payment intent found for this session.'));
        }

        $paymentIntentId = $session->payment_intent;

        $booking->status = 'paid';
        $booking->stripe_charge_id = $paymentIntentId;
        $booking->save();

        return view('bookings.checkout-success', compact('booking'));
    }
    public function cancel(){
        return redirect()->route('home')->with('error', __('messages.Payment was canceled.'));
    }
    public function refund($bookingId){
        $booking = Booking::findOrFail($bookingId);
        $departureTime = $booking->trip->departure_time;
        if (now()->greaterThanOrEqualTo($departureTime)) {
            return redirect()->back()->with([
                'error' => __('messages.Refund Failed'),
                'description' => __('messages.This trip has already departed.'),
            ]);
        }
        $paymentIntentId = $booking->stripe_charge_id;
        if (empty($paymentIntentId)) {
            return redirect()->back()->with([
                'error' => __('messages.Refund Failed'),
                'description' => __('messages.No PaymentIntent ID found for this booking.')
            ]);
        }
        $stripe = new StripeClient(config('services.stripe.secret'));
        try {
            $refund = $stripe->refunds->create([
                'payment_intent' => $paymentIntentId,
            ]);
            $booking->update(['status' => 'refunded']);

            $tripDetails = [
                'originCity' => $booking->trip->origincity->name,
                'destinationCity' => $booking->trip->destinationcity->name,
                'refund' => $booking->total_price,
            ];
            $message = __('messages.Your ride from'). $tripDetails['originCity'] .__('messages.to'). $tripDetails['destinationCity'] .__('messages.has been canceled.').$booking['total_price'] . __('messages.have been refunded.');
            event(new Notifications($message , auth()->id(), $tripDetails));


            $toDriver = [
                'passenger' => $booking->passenger->name,
                'originCity' => $booking->trip->origincity->name,
                'destinationCity' => $booking->trip->destinationcity->name,
            ];
            $driver = $booking->trip->driver_id;
            $message = $toDriver['passenger'] . __('messages.has canceled their booking from'). $toDriver['originCity'] .__('messages.to').$toDriver['destinationCity'];
            event(new Notifications($message , $driver, $tripDetails));


            return redirect('/bookings')->with('status', __('messages.Booking canceled and refunded successfully.'));
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => __('messages.Refund Failed'),
                'description' =>  $e->getMessage()
            ]);
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

        $tripDetails = [
            'originCity' => $booking->trip->origincity->name,
            'destinationCity' => $booking->trip->destinationcity->name,
        ];
        $message = __('messages.Your ride from'). $tripDetails['originCity'] .__('messages.to'). $tripDetails['destinationCity'] .__('messages.has been canceled.');

        event(new Notifications($message , auth()->id(), $tripDetails));

        $todriver = [
            'passenger' => $booking->passenger->name,
            'originCity' => $booking->trip->origincity->name,
            'destinationCity' => $booking->trip->destinationcity->name
        ];
        $message = $todriver['passenger']. __('messages.has canceled their reservation from') . $todriver['originCity'] .__('messages.to'). $todriver['destinationCity'];
        $driver = $booking->trip->driver_id;
        event(new Notifications($message , $driver, $todriver));
        return redirect('/trips')->with('success', __('messages.Booking deleted successfully'));
    }
}
