<?php

namespace App\Http\Controllers;



use App\Events\LiveLocation;
use App\Jobs\SendSosMail;
use App\Models\SosAlert;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SOSController extends Controller
{
    public function sendSOS(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'trip_id' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'status' => 'required',
        ]);
        $existingAlert = SosAlert::where('user_id', $request->input('user_id'))
            ->where('trip_id', $request->input('trip_id'))
            ->where('status', 'pending')
            ->first();

        if ($existingAlert) {
            return back()->with(['error' => 'An SOS alert is already active for this trip.']);
        }

        $sosAlert = SosAlert::create([
            'user_id' => $request->input('user_id'),
            'trip_id' => $request->input('trip_id'),
            'location' => $request->input('location'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'status' => $request->input('status'),
        ]);
        SendSosMail::dispatch($sosAlert)->onQueue('sos-emails');
        broadcast(new LiveLocation($request->latitude, $request->longitude, $request->trip_id));
        return back()->with('success', 'Message has been sent successfully!');
    }

    public function view($id)
    {
        $sosAlert = SosAlert::findOrFail($id);
        $trips = Trip::where('id',  $sosAlert->trip_id)
            ->with(['bookings.passenger'])
            ->first();

        return view('trips.sos-details', (['sosAlert'=>$sosAlert, 'trips'=>$trips]));
    }

    public function updateLocation(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $tripId = $request->trip_id;

        // Update the location in the database
        $sosAlert = SosAlert::where('trip_id', $tripId)->first();
        $sosAlert->update([
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        // Broadcast the location update
        broadcast(new LiveLocation($request->latitude, $request->longitude, $request->trip_id));

        return response()->json(['success' => true]);
    }

    public function logs()
    {
        $sosAlerts = SosAlert::with(['trips.bookings.passenger'])->get();

        return view('superadmin.sos-logs', ['sosAlerts' => $sosAlerts]);
    }
    
    public function resolve(SosAlert $sosAlert)
    {
        $sosAlert->update(['status' => 'resolved']);
        return redirect()->back()
            ->with('success', 'Situation has been resolved!');
    }
}