<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TripController;

Route::prefix('trips')->name('trips.')->group(function () {
    Route::get('/', [TripController::class, 'index'])->name('index');
    Route::get('/create', [TripController::class, 'create'])->name('create');
    Route::post('/store', [TripController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TripController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TripController::class, 'update'])->name('update');
    Route::delete('/{id}', [TripController::class, 'destroy'])->name('destroy');
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

require __DIR__.'/auth.php';


