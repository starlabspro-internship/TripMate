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

Route::middleware('auth')->prefix('trips')->name('trips.')->controller(TripController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::get('/{trip}/edit', 'edit')->name('edit');
    Route::get('/{trip}', 'show')->name('show');
});

Route::middleware('ifnotauth')->prefix('bookings')->name('bookings.')->controller(BookingController::class)->group(function () {
    Route::get('/myTrips', 'myTripsBookings')->name('myTrips');
    Route::post('/{booking}/refund', 'refund')->name('refund');
    Route::get('/', 'index')->name('index');
    Route::get('/cancel', 'cancel')->name('cancel');
    Route::get('/success', 'success')->name('success');
    Route::post('/store', 'store')->name('store');
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

Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [SocialAuthController::class, 'googleCallback'])->name('login.google.callback');

Route::prefix('superadmin')->middleware('superadmin')->name('superadmin.')->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('index');
    Route::get('/edit/{user}', [SuperAdminController::class, 'edit'])->name('edit');
    Route::patch('/{user}', [SuperAdminController::class, 'update'])->name('update');
    Route::get('/{trip}/edit-trip', [SuperAdminController::class, 'edittrip'])->name('edit-trip');
    Route::patch('/trip/{trip}', [SuperAdminController::class, 'updateTrip'])->name('updateTrip');
});

Route::delete('/trips/{trip}', [SuperAdminController::class, 'tripDelete'])->name('trip.delete');
Route::delete('/bookings/{booking}', [SuperAdminController::class, 'bookingDelete'])->name('booking.delete');
Route::delete('/users/{user}', [SuperAdminController::class, 'superDelete'])->name('users.destroy');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('enter-code', function () {
    return view('auth.enter-code');
})->name('enter-code');

Route::post('enter-code', [RegisteredUserController::class, 'verifyCode'])->name('enter.code');

Route::get('profile/verification', function () {
    return view('profile.verification');
})->name('profile.verification')->middleware('auth');

Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {
    $user = \App\Models\User::findOrFail($id);
    if (Hash::check($user->getEmailForVerification(), $hash)) {
        $user->markEmailAsVerified();
        return redirect()->route('profile.verification');
    }
    return redirect()->route('verification.failure');
})->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

require __DIR__.'/auth.php';
