<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{

    public function index($id)
    {
        $bookings = Booking::all(); 
        $trip = Trip::findOrFail($id);
        return view('bookings.index', compact('bookings', 'trip'));

    }
    public function store($id)
    {
        $booking = Booking::create([
            'trip_id' => request('trip_id'),
            'passenger_id' => request('passenger_id'),
            'seats_booked' => request('seats_booked'),
            'status' => 'active',
        ]);
    
        return redirect()->route('booking.index', ['id' => $booking->trip_id])->with('booking', $booking);
    }


    public function destroy($id){
        
        $booking = Booking::find($id);
        $booking->delete();
    
        return redirect('/trips')->with('success', 'Book deleted successfully');
    }
    
}
