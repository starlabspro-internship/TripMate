<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{
    public function index(Request $request)
{
    $cities = City::all();
    $trips = Trip::query();

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
            'destination_city_id' => 'required|exists:cities,id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'available_seats' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);
    
        Trip::create($request->all());
    
        return redirect('/trips')->with('success', 'Trip created successfully');
    }
    public function edit($id){
        $trip = Trip::findOrFail($id);
        $cities = City::all();
        $drivers = User::all();


        if (Auth::id() !== $trip->driver_id) {
            return view('trips.unauthorized');
        }

    
        return view('trips.edit', compact('trip', 'cities', 'drivers'));
    }
    
    public function show($id)
    {
        $trip = Trip::with(['users', 'origincity', 'destinationcity'])->find($id);

        if (!$trip) {
            return response()->json(['message' => 'Trip not found'], 404);
        }

        return response()->json($trip);
    }

    public function update(Request $request, $id){
        $trip = Trip::findOrFail($id);


            if (Auth::id() !== $trip->driver_id) {
                return view('trips.unauthorized');
            }

        $request->validate([
            'origin_city_id' => 'exists:cities,id',
            'destination_city_id' => 'exists:cities,id',
            'departure_time' => 'date',
            'arrival_time' => 'date|after:departure_time',
            'available_seats' => 'integer|min:1',
            'price' => 'numeric|min:0',
        ]);
        $trip->update($request->except('driver_id')); 
        return response()->json(['success' => true, 'redirect' => route('trips.index')]);
    }
    

    public function destroy($id){
        $trip = Trip::findOrFail($id);
        $trip->delete();
    
        return redirect('/trips')->with('success', 'Trip deleted successfully');
    }
    
}
