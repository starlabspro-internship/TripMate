<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Hash;


Auth::routes(['verify' => true]);

// Home route - accessible only to verified users
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('verified');

// Trip routes - available to users who are not authenticated
Route::middleware('ifnotauth')->prefix('trips')->name('trips.')->controller(TripController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::get('/{trip}/edit', 'edit')->name('edit');
    Route::get('/{trip}', 'show')->name('show');
});

// Booking routes - available to users who are not authenticated
Route::middleware('ifnotauth')->prefix('bookings')->name('booking.')->controller(BookingController::class)->group(function () {
    Route::post('/',  'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::delete('/{id}', 'destroy')->name('destroy');
});



Route::get('/home', function(){
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('home');
})->name('home');

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('home');
})->name('home');

Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
Route::get('/dashboard', [SuperAdminController::class, 'count'])->middleware(['auth', 'superadmin'])->name('dashboard');


// Profile routes - require authentication
Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Social auth routes
Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [SocialAuthController::class, 'googleCallback'])->name('login.google.callback');

Route::prefix('superadmin')->middleware('superadmin')->name('superadmin.')->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('index');
    Route::get('/edit/{user}', [SuperAdminController::class, 'edit'])->name('edit');
    Route::patch('/{user}', [SuperAdminController::class, 'update'])->name('update');
    Route::get('/{trip}/edit-trip', [SuperAdminController::class, 'edittrip'])->name('edit-trip');
    Route::patch('/trip/{trip}', [SuperAdminController::class, 'updateTrip'])->name('updateTrip');
});

// Delete routes for trips, bookings, and users (admin-only)
Route::delete('/trips/{trip}', [SuperAdminController::class, 'tripDelete'])->name('trip.delete');
Route::delete('/bookings/{booking}', [SuperAdminController::class, 'bookingDelete'])->name('booking.delete');
Route::delete('/users/{user}', [SuperAdminController::class, 'superDelete'])->name('users.destroy');

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// User registration and verification routes
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

// Verification routes
Route::get('enter-code', function () {
    return view('auth.enter-code');
})->name('enter-code');

// Route to handle the verification code submission
Route::post('enter-code', [RegisteredUserController::class, 'verifyCode'])->name('enter.code');

// Redirect verified users to the profile verification page
Route::get('profile/verification', function () {
    return view('profile.verification');
})->name('profile.verification')->middleware('auth');

// Email verification route with redirect to profile verification after verification
Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {
    $user = \App\Models\User::findOrFail($id);
    if (Hash::check($user->getEmailForVerification(), $hash)) {
        $user->markEmailAsVerified();
        // Redirect to the profile verification page after email is verified
        return redirect()->route('profile.verification');
    }
    return redirect()->route('verification.failure');
})->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

require __DIR__.'/auth.php';
