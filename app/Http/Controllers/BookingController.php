<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{

    public function show($id)
    {
        $booking = Booking::with(['trip',  'passenger'])->find($id);
        $trip = Trip::findOrFail($booking->trip_id);
        if (!$trip) {
            return redirect()->route('trips.index')->with('error', 'Trip not found');
        }

        return view('bookings.show', compact('booking', 'trip'));
    }

    public function store()
    {
        $booking = Booking::create([
            'trip_id' => request('trip_id'),
            'passenger_id' => request('passenger_id'),
            'seats_booked' => request('seats_booked'),
            'status' => 'active',
        ]);
    
        return redirect()->route('booking.show', ['id' => $booking->id])->with('booking', $booking);
    }


    public function destroy($id){
        
        $booking = Booking::find($id);
        $booking->delete();
    
        return redirect('/trips')->with('success', 'Book deleted successfully');
    }

    
}
