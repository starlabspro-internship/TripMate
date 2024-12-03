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
use App\Http\Controllers\UserVerifyController;




Auth::routes(['verify' => true]);

Route::middleware('auth')->prefix('trips')->name('trips.')->controller(TripController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::get('/{trip}/edit', 'edit')->name('edit');
    Route::get('/{trip}', 'show')->name('show');
    Route::post('/{trip}/end', 'end')->name('end');
});
Route::post('/{trip}/start',  [TripController::class, 'start'])->name('trip.start');

Route::middleware('ifnotauth')->prefix('bookings')->name('bookings.')->controller(BookingController::class)->group(function () {
    Route::get('/transactions','myTransactions')->name('transactions');
    Route::get('/myTrips', 'myTripsBookings')->name('myTrips');
    Route::post('/{booking}/refund', 'refund')->name('refund');
    Route::get('/', 'index')->name('index');
    Route::get('/cancel', 'cancel')->name('cancel');
    Route::get('/success', 'success')->name('success');
    Route::post('/store', 'store')->name('store');
    Route::post('/reserve', 'reserve')->name('reserve');
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

Route::get('/dashboard', [SuperAdminController::class, 'count'])->middleware(['auth', 'superadmin'])->name('dashboard');

Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/', [ProfileController::class, 'uploadBackground'])->name('profile.background');

 Route::post('/upload-id-document', [ProfileController::class, 'uploadDocument'])->name('profile.upload-id-document');
Route::get('/verify-profile', [ProfileController::class, 'showVerifyPage'])->name('profile.verify-user');


});

Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [SocialAuthController::class, 'googleCallback'])->name('login.google.callback');

Route::prefix('superadmin')->middleware('superadmin')->name('superadmin.')->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('index');
    Route::get('/edit/{user}', [SuperAdminController::class, 'edit'])->name('edit');
    Route::patch('/{user}', [SuperAdminController::class, 'update'])->name('update');
    Route::get('/{trip}/edit-trip', [SuperAdminController::class, 'edittrip'])->name('edit-trip');
    Route::patch('/trip/{trip}', [SuperAdminController::class, 'updateTrip'])->name('updateTrip');
    Route::delete('/trips/{trip}', [SuperAdminController::class, 'tripDelete'])->name('trip.delete');
    Route::delete('/bookings/{booking}', [SuperAdminController::class, 'bookingDelete'])->name('booking.delete');
    Route::delete('/users/{user}', [SuperAdminController::class, 'superDelete'])->name('users.destroy');
    Route::get('/bg-check', [SuperAdminController::class, 'indexBg'])->name('bg-check');
    Route::post('/bg-check/{user}/verify', [SuperAdminController::class, 'bgVerify'])->name('bgverify');
    Route::post('/bg-check/{user}/flag', [SuperAdminController::class, 'bgFlagged'])->name('bgflagged');
});
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

Route::middleware(['superadmin'])->prefix('superadmin')->group(function () {

    Route::get('/users', [UserVerifyController::class, 'indexPending'])->name('superadmin.users.index-users');
    Route::post('/users/{user}/verify', [UserVerifyController::class, 'verify'])->name('superadmin.users.verify');
    Route::post('/users/{user}/reject', [UserVerifyController::class, 'reject'])->name('superadmin.users.reject');
    Route::get('/transactions', [BookingController::class, 'transactions'])->name('superadmin.transactions');
});
Route::get('profile/upload-file', function () {
    return view('profile.upload-file');
})->name('profile.upload-file')->middleware('auth');



require __DIR__.'/auth.php';
