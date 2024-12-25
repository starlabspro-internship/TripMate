<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use App\Models\PassengerRating;
use App\Models\City;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $cities = City::orderBy('name', 'asc')->get();
        return view('profile.edit', [
            'user' => $request->user(),'cities' => $cities
        ]);
    }

    public function index(Request $request): View
    {
        $userId = auth()->id();
        $user = $request->user();
        $bookings = Booking::with(['trip.origincity', 'trip.destinationcity'])
            ->where('passenger_id', $userId)
            ->whereHas('trip', function ($query) {
                $query->where('arrival_time', '<', now());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $trips = Trip::with(['origincity', 'destinationcity'])
            ->where('driver_id', $userId)
            ->where('arrival_time', '<', now())
            ->orderBy('created_at', 'desc')
            ->get();

        $user = auth()->user();
        $tripCount = Trip::where('driver_id', $user->id)->count();


            $feedback = PassengerRating::where('reviewed_id', $userId)
            ->whereNotNull('feedback')  
            ->where('feedback', '!=', '') 
            ->count();

            $userId = $request->user()->id;

            $feedbacks = PassengerRating::with('reviewer')
                ->where('reviewed_id', $userId)
                ->orderBy('created_at', 'desc')
                ->take(4)
                ->get();
        
            return view('profile.index', ['bookings' => $bookings, 'trips' => $trips, 'user' => $user , 'feedback' => $feedback , 'tripCount' => $tripCount, 'feedbacks'=>$feedbacks]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse{

        $validatedData = $request->validated();



        $user = $request->user();
        $user->fill($validatedData);
        $cityName = City::where('id', $request->city)->value('name');
 
        if ($request->has('email') && $user->email !== $request->email) {
            $user->email = $request->email;
        }
        
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

        $path = $request->file('image')->store('profile', 'public');
        $user->image = $path;
    }

        $user->save();

        return Redirect::route('profile.index')->with('success', __('messages.Profile updated'));
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }



    public function showVerifyPage()
    {
        return view('profile.verify-user');
    }



    public function uploadDocument(Request $request)
{
    $request->validate([
        'image_data' => 'required|string',
    ]);

    $imageData = $request->input('image_data');


    $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $imageData);
    $imageData = base64_decode($imageData);

    if (!$imageData) {
        return response()->json(['message' => __('messages.Invalid image data')], 400);
    }


    $fileName = 'id_document_' . auth()->id() . '_' . time() . '.jpg';


    $filePath = storage_path('app/public/uploads/id_documents');
    if (!file_exists($filePath)) {
        mkdir($filePath, 0777, true);
    }


    file_put_contents($filePath . '/' . $fileName, $imageData);


    auth()->user()->update(['id_document' => 'uploads/id_documents/' . $fileName,
    'verification_status' => 'pending',]);

    return response()->json([
        'message' => __('messages.Document uploaded successfully'),
        'success' => true,
        'redirect_url' => route('profile.index'),
    ]);

    
}
    public function uploadBackground(Request $request)
    {
        $request->validate([
            'background_document' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);
        $user = Auth::user();
        if ($request->hasFile('background_document')) {
            if ($user->background_document) {
                Storage::disk('public')->delete($user->background_document);
            }
            $filepath = $request->file('background_document')->store('bg_doc', 'public');
            $user->update(['background_document' => $filepath, 'background_status' => 'pending' ]);
        }
        return Redirect::route('profile.index')->with('success', __('messages.File Uploaded'));
    }
}




