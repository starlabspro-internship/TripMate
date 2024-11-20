<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function index(Request $request): View
    {
        return view('profile.index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse{

        $validatedData = $request->validated();
      


        $user = $request->user();
        $user->fill($validatedData);

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
    
        $path = $request->file('image')->store('images', 'public'); 
        $user->image = $path;
    }

        $user->save();

        return Redirect::route('profile.index')->with('status', 'profile-updated');
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


    
    public function uploadDocument(Request $request)
{
    $request->validate([
        'image_data' => 'required|string', 
    ]);

    $imageData = $request->input('image_data');

    
    $imageData = preg_replace('/^data:image\/\w+;base64,/', '', $imageData);
    $imageData = base64_decode($imageData);

    if (!$imageData) {
        return response()->json(['message' => 'Invalid image data'], 400);
    }

 
    $fileName = 'id_document_' . auth()->id() . '_' . time() . '.jpg';

    
    $filePath = storage_path('app/public/uploads/id_documents');
    if (!file_exists($filePath)) {
        mkdir($filePath, 0777, true); // Create directory if it doesn't exist
    }

    // Save the file
    file_put_contents($filePath . '/' . $fileName, $imageData);

   
    auth()->user()->update(['id_document' => 'uploads/id_documents/' . $fileName]);

    return response()->json(['message' => 'Document uploaded successfully']);
}

    
}

