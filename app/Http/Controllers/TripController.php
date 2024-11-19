<?php

namespace App\Http\Controllers;

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

    $trips->where('departure_time', '>=', now()); 

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
    $trips = $trips->orderBy('created_at', 'desc')->get();

    foreach ($trips as $trip) {
        $available_seats = $trip->available_seats;
        foreach ($trip->bookings as $booking) {
            $available_seats -= $booking->seats_booked;
        }
        $trip->available_seats = $available_seats;
    }

    return view('trips.index', compact('cities', 'trips'));
}

    public function create(){
        $cities = City::all();
        $drivers = User::all();
        return view('trips.create', compact('cities', 'drivers'));
    }
    public function store(Request $request){
        $request->validate([
            'driver_id' => 'required|exists:users,id',
            'origin_city_id' => 'required|exists:cities,id',
            'destination_city_id' => 'required|exists:cities,id|different:origin_city_id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'available_seats' => 'required|integer|min:1|max:7',
            'price' => 'required|numeric|min:0|max:50',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
    
        Trip::create($request->all());
    
        return redirect('/trips')->with('success', 'Trip created successfully');
    }
    public function edit($id){
        $trip = Trip::find($id);
        if (!$trip) {
            return redirect()->route('trips.index')->with('error', 'Trip not found');
        }
        if (auth()->id() !== $trip->driver_id) {
            return redirect()->route('trips.index')->with('error', 'You do not have permission to edit this trip.');
        }
        $cities = City::all();
        $drivers = User::all();
    
        return view('trips.edit', compact('trip', 'cities', 'drivers'));
    }

    
    public function show($id)
    {
        $trip = Trip::with(['users', 'origincity', 'destinationcity', 'bookings'])->find($id);
        if (!$trip) {
            return redirect()->route('trips.index')->with('error', 'Trip not found');
        }
        if (auth()->id() === $trip->driver_id) {
            return redirect()->route('trips.index')->with('error', 'You cannot book your own trip.');
        }
        $available_seats = $trip->available_seats;
        foreach($trip->bookings as $booking) {
            $available_seats -= $booking->seats_booked;
        }

        return view('trips.show', ['trip' => $trip, 'available_seats'=> $available_seats]);
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
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',

        ]);
        $trip->update($request->except('driver_id')); 
        return response()->json(['success' => true, 'redirect' => route('trips.index')]);
    }
    

    public function destroy($id){
        $trip = Trip::findOrFail($id);
        if (auth()->id() !== $trip->driver_id) {
            return redirect()->route('trips.index')->with('error', 'You do not have permission to delete this trip.');
        }
        $bookings = Booking::where('trip_id', $trip->id)->where('status', 'paid')->get();
    
        if ($bookings->isNotEmpty()) {
            $stripe = new StripeClient(config('services.stripe.secret'));
            foreach ($bookings as $booking) {
                if (now()->greaterThanOrEqualTo($trip->departure_time)) {
                    return redirect()->route('trips.index')->with('error', 'Trip cannot be deleted because it has already departed.');
                }
                try {
                    $refund = $stripe->refunds->create([
                        'payment_intent' => $booking->stripe_charge_id,
                    ]);
                    $booking->update(['status' => 'refunded']);
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Refund failed for a booking: ' . $e->getMessage());
                }
            }
        }
        $trip->delete();
        return redirect('/trips')->with('success', 'Trip deleted successfully and all bookings have been refunded.');
    }
}
