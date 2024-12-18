<?php

namespace App\Http\Controllers;

use App\Events\Notifications;
use App\Models\City;
use App\Models\User;
use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SuperAdminController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();
        $bookings = Booking::with('passenger')->get();
        $trips = Trip::with(['users', 'origincity', 'destinationcity'])->get();

        // Pass the users to the view
        return view('superadmin.index', compact('users', 'bookings', 'trips'));
    }

    public function edit(User $user){
        return view('superadmin.edit', ['user'=>$user]);
    }

    public function update(Request $request, User $user){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'city' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'birthday' => 'nullable|date',
            'role' => 'nullable|string|max:255'
        ]);

        $user->fill($validatedData);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

//        $request->validate([
//            'image'=>'required',
//        ]);
//
//        if (request()->hasFile('image')) {
//            if ($user->image){
//                Storage::disk('public')->delete($user->image);
//            }
//
//            $path = $request->file('image')->store('images', 'public');
//            $user->image = $path;
//            $user->save();
//        }

        $user->save();

        return Redirect::route('superadmin.index')->with('success', 'Profile updated');
    }

    public function superDelete(User $user){
        $user->delete();
        return redirect()->route('superadmin.index')->with([
            'success' => 'User successfully deleted.',
        ]);
    }

    public function edittrip(Trip $trip){

        $cities = City::all();

        return view('superadmin.edit-trip', ['trip'=>$trip, 'cities'=>$cities]);
    }
    public function updateTrip(Request $request, Trip $trip){

        $request->validate([
            'origin_city_id' => 'required',
            'destination_city_id' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'available_seats' => 'required',
            'price' => 'required',
        ]);

        $trip->origin_city_id = $request->origin_city_id;
        $trip->destination_city_id = $request->destination_city_id;
        $trip->departure_time = $request->departure_time;
        $trip->arrival_time = $request->arrival_time;
        $trip->available_seats = $request->available_seats;
        $trip->price = $request->price;

        $trip->save();

        return redirect()->route('superadmin.index', ['tab' => 'trips'])->with('success', 'Trip updated');

    }
    public function tripDelete(Trip $trip){
        $trip->delete();
        return redirect()->route('superadmin.index', ['tab' => 'trips'])->with([
            'success' => 'Trip successfully deleted.',
            'description' => 'You deleted the trip.',
        ]);
    }
    public function bookingDelete(Booking $booking){
        $booking->delete();
        return redirect()->route('superadmin.index', ['tab' => 'bookings'])->with([
            'success' => 'Booking successfully deleted.',
        ]);
    }

    public function count()
    {
        $verifiedUsers = User::where('verification_status', 'verified')->count();
        $nullStatusUsers = User::whereNull('verification_status')->count();
        $totalBookings = Booking::count();
        $totalUsers = User::count();
        $totalTrips = Trip::count();
        $query = Booking::with(['trip.origincity', 'trip.destinationcity', 'passenger']);
        $transactions = $query->get();
        return view('dashboard', compact('totalTrips', 'totalUsers', 'totalBookings','transactions','verifiedUsers', 'nullStatusUsers'));
    }

    public function indexBg()
    {
        $users = User::all();

        return view('superadmin.bg-check', compact('users'));
    }

    public function bgVerify(User $user)
    {
        if (!$user->background_document) {
            return redirect()->route('superadmin.bg-check')
                ->with([
                    'error' => 'Verification Failed',
                    'description' => 'User cannot be verified as no document has been uploaded.'
                ]);
        }
        $user->update(['background_status' => 'verified']);
        event(new Notifications( __('messages.Your background document has been verified successfully!'), $user->id));
        return redirect()->route('superadmin.bg-check')
            ->with('success', 'User verified successfully');
    }

    public function bgFlagged(User $user)
    {
        if (!$user->background_document || $user->background) {
            return redirect()->route('superadmin.bg-check')
                ->with([
                    'error' => 'Verification Failed',
                    'description' => 'User cannot be flagged as no document has been uploaded.'
                ]);
        }
        $user->update(['background_status' => 'flagged']);
        event(new Notifications(__('messages.Your background document has been flagged!'), $user->id));
        return redirect()->route('superadmin.bg-check')
            ->with('success', 'User has been flagged');
    }


}

