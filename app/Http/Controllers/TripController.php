<?php

namespace App\Http\Controllers;

use App\Events\EndTrip;
use App\Events\Notifications;
use App\Models\Trip;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Carbon\Carbon;
use App\Models\Booking;
use Stripe\StripeClient;

class TripController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::all();
        $trips = Trip::with('bookings');

        $trips->where(function ($query) {
            $query->where('status', '!=', 'Completed')
                  ->orWhereNull('status');
        });

        Trip::where('status', 'Waiting')
        ->where('arrival_time', '<', now())
        ->update(['status' => 'Failed']);

    $trips->where(function ($query) {
        $query->where('status', '!=', 'Completed')
              ->orWhere('status', 'Failed')
              ->orWhereNull('status');
            });

        if ($request->filled('date')) {
            $date = $request->input('date');
            $trips->whereDate('departure_time', $date);
        }

        if ($request->filled('origin_city_id')) {
            $originCityId = $request->input('origin_city_id');
            $trips->where('origin_city_id', $originCityId);
        }

        if ($request->filled('destination_city_id')) {
            $destinationCityId = $request->input('destination_city_id');
            $trips->where('destination_city_id', $destinationCityId);
        }

        $userGender = auth()->user()->gender;

        if ($userGender == 'male') {
            $trips->where('passenger_gender_preference', '!=', 'female');
        } elseif ($userGender == 'female') {

        }

        $trips = $trips->orderBy('created_at', 'desc')->get();

        foreach ($trips as $trip) {
            $available_seats = $trip->available_seats;
            foreach ($trip->bookings as $booking) {
                $available_seats -= $booking->seats_booked;
            }
            $trip->available_seats = $available_seats;
        }

        $userId = auth()->id();


        $currentTrip = Trip::where('status', 'In Progress')
            ->where(function ($query) use ($userId) {
                $query->where('driver_id', $userId)
                    ->orWhereHas('bookings', function ($subQuery) use ($userId) {
                        $subQuery->where('passenger_id', $userId);
                    });
            })
            ->pluck('id')
            ->first();


        return view('trips.index', (['cities' => $cities, 'trips' => $trips, 'currentTrip' => $currentTrip]));
    }

    public function create(){
        $cities = City::all();
        $drivers = User::all();
        return view('trips.create', compact('cities', 'drivers'));
    }
    public function store(Request $request)
    {
        if (!auth()->user()->email_verified_at && !auth()->user()->google_id) {
            return redirect('/trips')->with([
                'error' => __('messages.Trip can`t be created'),
                'description' => __('messages.Your email address is not verified. Please verify your email before booking a trip.'),
            ]);
        }

        $driverId = $request->driver_id;
        $departureTime = Carbon::createFromFormat('d-m-Y H:i', $request->departure_time)->format('Y-m-d H:i:s');
        $arrivalTime = Carbon::createFromFormat('d-m-Y H:i', $request->arrival_time)->format('Y-m-d H:i:s');


        $hasTrip = Trip::where('driver_id', $driverId)
        ->where('status', '!=', 'Completed')
        ->where('arrival_time', '>', now())
        ->where(function ($query) use ($departureTime, $arrivalTime) {
            $query->where('departure_time', '<', $arrivalTime)
                ->where('arrival_time', '>', $departureTime);
        })->exists();


        if ($hasTrip) {

            return redirect('/trips')->with([
                'error' => __('messages.Trip can`t be created'),
                'description' => __('messages.You are driving another trip during this time.'),
            ]);
        }
        $hasBooking = Booking::where('passenger_id', $request->driver_id)
            ->whereHas('trip', function ($query) use ($departureTime, $arrivalTime) {
                $query->where('departure_time', '<', $arrivalTime)
                    ->where('arrival_time', '>', $departureTime);
            })->exists();
        if ($hasBooking) {
            return redirect('/trips')->with([
                'error' => __('messages.Trip can`t be created'),
                'description' => __('messages.You already have a booking during this time.'),
            ]);
        }

        $validatedData = $request->validate([
            'driver_id' => 'required|exists:users,id',
            'origin_city_id' => 'required|exists:cities,id',
            'destination_city_id' => 'required|exists:cities,id|different:origin_city_id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'available_seats' => 'required|integer|min:1|max:7',
            'price' => 'required|numeric|min:0|max:50',
            'driver_comments' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'passenger_gender_preference' => 'nullable|in:female,all',
        ]);

        $trip = Trip::create($validatedData);

        $tripDetails = [
            'originCity' => $trip->origincity->name,
            'destinationCity' => $trip->destinationcity->name,
        ];
        $message = __('messages.Your trip from'). $tripDetails['originCity'] . __('messages.to'). $tripDetails['destinationCity']. __('messages.has been created');
        event(new Notifications($message, auth()->id(), $tripDetails));
        return redirect('/trips')->with('success', __('messages.Trip created successfully'));

    }
    public function edit($id){
        $trip = Trip::find($id);
        if (!$trip) {
            return redirect()->route('trips.index')->with('error', __('messages.Trip not found'));
        }
        if (auth()->id() !== $trip->driver_id) {
            return redirect()->route('trips.index')->with([
                'error' => __('messages.Trip cannot be edited.'),
                'description' => __('You do not have permission to edit this trip.'),
            ]);
        }
        $cities = City::all();
        $drivers = User::all();

        if (now()->greaterThanOrEqualTo($trip->departure_time)) {
            return redirect()->route('trips.index')->with([
                'error' => __('messages.Trip cannot be edited.'),
                'description' => __('messages.This trip has already departed.'),
            ]);
        }

        return view('trips.edit', compact('trip', 'cities', 'drivers'));
    }


    public function show($id)
    {
        $trip = Trip::with(['users', 'origincity', 'destinationcity', 'bookings'])->find($id);
        if (!$trip) {
            return redirect()->route('trips.index')->with('error', __('messages.Trip not found'));
        }
        if (auth()->id() === $trip->driver_id) {
            return redirect()->route('trips.index')->with([
                'error' => __('messages.Booking failed.'),
                'description' => __('messages.You cannot book your own trip.'),
            ]);
        }
        $available_seats = $trip->available_seats;
        foreach($trip->bookings as $booking) {
            $available_seats -= $booking->seats_booked;
        }

        $user = User::find($trip->driver_id);
        $countTrips = $user->trips()->count();
        return view('trips.show', ['trip' => $trip, 'available_seats'=> $available_seats, 'countTrips' => $countTrips]);
    }

    public function update(Request $request, $id){
        $trip = Trip::findOrFail($id);
        $request->validate([
            'origin_city_id' => 'exists:cities,id',
            'destination_city_id' => 'exists:cities,id|different:origin_city_id',
            'departure_time' => 'date',
            'arrival_time' => 'date|after:departure_time',
            'available_seats' => 'integer|min:1|max:7',
            'price' => 'numeric|min:0|max:50',
            'driver_comments'=> 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'passenger_gender_preference' => 'nullable|in:female,all',


        ]);
        $trip->update($request->except('driver_id'));
        return redirect('/trips')->with('success', __('messages.Trip updated successfully'));
    }


    public function destroy($id){
        $trip = Trip::findOrFail($id);
        if (auth()->id() !== $trip->driver_id) {
            return redirect()->route('trips.index')->with([
                'error' => __('messages.Trip cannot be deleted.'),
                'description' => __('messages.You do not have permission to delete this trip.'),
            ]);
        }
        $bookings = Booking::where('trip_id', $trip->id)->where('status', 'paid')->get();

        if ($bookings->isNotEmpty()) {
            $stripe = new StripeClient(config('services.stripe.secret'));
            foreach ($bookings as $booking) {
                if (now()->greaterThanOrEqualTo($trip->departure_time)) {
                    return redirect()->route('trips.index')->with([
                        'error' => __('messages.Trip cannot be deleted.'),
                        'description' => __('messages.This trip has already departed.'),
                    ]);
                }
                try {
                    $refund = $stripe->refunds->create([
                        'payment_intent' => $booking->stripe_charge_id,
                    ]);
                    $booking->update(['status' => 'refunded']);
                    $tripDetails = [
                        'originCity' => $trip->origincity->name,
                        'destinationCity' => $trip->destinationcity->name,
                        'price' => $booking->total_price,
                    ];
                    $message = __('messages.Your ride from'). $tripDetails['originCity'] .__('messages.to'). $tripDetails['destinationCity'] .__('messages.has been canceled from the driver. Your') . $tripDetails['price'] . __('messages.€ has been refunded.');

                    event(new Notifications($message , $booking->passenger_id, $tripDetails));

                } catch (\Exception $e) {
                    return redirect()->back()->with([
                        'error' => __('messages.Refund failed'),
                        'description' => __('messages.Refund failed for a booking:') . $e->getMessage(),
                    ]);
                }
            }
        }
        $trip->delete();

        $tripDetails = [
            'originCity' => $trip->origincity->name,
            'destinationCity' => $trip->destinationcity->name,
        ];
        $message = __('messages.Your ride from'). $tripDetails['originCity'] .__('messages.to'). $tripDetails['destinationCity'] .__('messages.has been canceled.');

        event(new Notifications($message , auth()->id(), $tripDetails));
        return redirect('/trips')->with([
            'success' => __('messages.Trip deleted successfully.'),
            'description' => __('messages.All bookings have been refunded.'),
        ]);
    }

//start and end trip
    public function start(Trip $trip)
{
    if (auth()->user()->id !== $trip->driver_id) {
        return back()->with('error', __('messages.You are not authorized to start this trip.'));
    }

    if (Carbon::parse($trip->departure_time)->isFuture()) {
        return back()->with('error', __('messages.This trip cannot be started yet. The trip is scheduled for a future date.'));
    }

    if ($trip->status !== 'Waiting') {
        return back()->with('error', __('messages.Trip cannot be started.'));
    }
    if ($trip->bookings()->count() < 1) {
        return back()->with('error', __('messages.The trip cannot be started because there are no bookings.'));
    }

    $trip->status = 'In Progress';
    $trip->start_time = now();
    $trip->save();

    return back()->with('success',  __('messages.Trip started successfully.'));
}

public function end(Trip $trip)
{
    if (auth()->user()->id !== $trip->driver_id) {
        return back()->with('error', __('messages.You are not authorized to end this trip.'));
    }

    if ($trip->status !== 'In Progress') {
        return back()->with('error', __('messages.Trip cannot be ended.'));
    }

    $trip->status = 'Completed';
    $trip->arrival_time = now();
    $trip->end_time= now();
    $trip->save();

    $passengerIds = Booking::where('trip_id', $trip->id)->pluck('passenger_id');

    foreach ($passengerIds as $passengerId) {
        $tripDetails = [
            'originCity' => $trip->origincity->name,
            'destinationCity' => $trip->destinationcity->name,
        ];
        $messageE = __('messages.Your trip from')  . $tripDetails['originCity'] . __('messages.to') . $tripDetails['destinationCity'] .  __('messages.has been successfully completed') . __('messages.Please rate your driver');
$messageN =  __('messages.Your trip from')  . $tripDetails['originCity'] . __('messages.to') . $tripDetails['destinationCity'] .  __('messages.has been successfully completed').
    '<a href="#" class="feedback-link" data-trip-id="' . $trip->id . '" data-driver-id="' . $trip->driver_id . '" style="color: #0066cc; text-decoration: underline;">' . __('Provide Your Feedback') . '</a>';
        $driverId = $trip->driver_id;
        $tripId = $trip->id;

        event(new EndTrip($messageE, $passengerId, $driverId, $tripId));
        event(new Notifications($messageN, $passengerId));
    }


    return back()->with('success', __('messages.Trip ended successfully.'));
}



public function history()
{
    $userId = auth()->id();

    $bookings = Booking::with(['trip.origincity', 'trip.destinationcity'])
        ->where('passenger_id', $userId)
        ->whereHas('trip', function ($query) {
            $query->where('status', 'Completed');
        })
        ->orderBy('updated_at', 'desc')
        ->get();

    $trips = Trip::with(['origincity', 'destinationcity'])
        ->where('driver_id', $userId)
        ->where('status', 'Completed')
        ->orderBy('end_time', 'desc')
        ->get();

    return view('profile.index', compact('bookings', 'trips'));
}

}
