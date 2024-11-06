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

    public function index()
    {
        $bookings = Booking::all();
        $booking = Booking::where('passenger_id', Auth::user()->id)->first();
        $trip = Trip::first();
        return view('bookings.index', compact('bookings', 'trip','booking'));

    }
    public function store()
    {
        $booking = Booking::create([
            'trip_id' => request('trip_id'),
            'passenger_id' => request('passenger_id'),
            'seats_booked' => request('seats_booked'),
            'status' => 'active',
        ]);
    
        return redirect()->route('booking.index')->with('booking', $booking);
    }


    public function destroy($id){
        
        $booking = Booking::find($id);
        $booking->delete();
    
        return redirect('/trips')->with('success', 'Book deleted successfully');
    }

    
}
