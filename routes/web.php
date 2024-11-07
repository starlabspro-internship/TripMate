<?php


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;

Route::prefix('trips')->name('trips.')->group(function () {
    Route::get('/', [TripController::class, 'index'])->name('index');
    Route::get('/create', [TripController::class, 'create'])->name('create');
    Route::get('/{id}', [TripController::class, 'show'])->name('show');
    Route::post('/store', [TripController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TripController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TripController::class, 'update'])->name('update');
    Route::delete('/{id}', [TripController::class, 'destroy'])->name('destroy');
});

Route::prefix('bookings')->name('booking.')->controller(BookingController::class)->group(function () {
    Route::post('/',  'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::delete('/{id}', 'destroy')->name('destroy');
});



Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('auth/google',[SocialAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback',[SocialAuthController::class, 'googleCallback'])->name('login.google.callback');

Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('index');
    Route::get('/edit/{user}', [SuperAdminController::class, 'edit'])->name('edit');
    Route::patch('/{user}', [SuperAdminController::class, 'update'])->name('update');
    Route::get('/{trip}/edit-trip', [SuperAdminController::class, 'edittrip'])->name('edit-trip');
    Route::patch('/trip/{trip}', [SuperAdminController::class, 'updateTrip'])->name('updateTrip');
});
Route::delete('/trips/{trip}', [SuperAdminController::class, 'tripDelete'])->name('trip.delete');
Route::delete('/bookings/{booking}', [SuperAdminController::class, 'bookingDelete'])->name('bookings.destroy');
Route::delete('/users/{user}', [SuperAdminController::class, 'superDelete'])->name('users.destroy');
require __DIR__.'/auth.php';


