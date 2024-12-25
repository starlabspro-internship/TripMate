<?php

namespace App\Http\Controllers;

use App\Models\Trip;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\PassengerRating;
use Illuminate\Support\Facades\Auth;

class PassengerRatingController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'reviewer_id' => 'required|exists:users,id',
            'reviewed_id' => 'required|exists:users,id',
            'rating' => 'required|in:1,2,3,4,5',
            'feedback' => 'nullable|string',
        ]);

        if ($validated['reviewer_id'] === $validated['reviewed_id']) {
            return back()->with(['error' => 'You cannot rate yourself.']);
        }
        $existingRating = PassengerRating::where('trip_id', $validated['trip_id'])
            ->where('reviewer_id', $validated['reviewer_id'])
            ->where('reviewed_id', $validated['reviewed_id'])
            ->first();

        if ($existingRating) {
            return back()->with(['error'  => 'You have already rated this user for this trip.']);
        }

        $rating = PassengerRating::create([
            'trip_id' => $validated['trip_id'],
            'reviewer_id' => $validated['reviewer_id'],
            'reviewed_id' => $validated['reviewed_id'],
            'rating' => $validated['rating'],
            'feedback' => $validated['feedback'],
        ]);

        $reviewedUser = User::find($validated['reviewed_id']);

        $averageRating = PassengerRating::where('reviewed_id', $reviewedUser->id)->avg('rating');

        $reviewedUser->average_rating = $averageRating;
        $reviewedUser->save();

        return back()->with('success', 'Your rating has been submitted successfully!');
    }

}
