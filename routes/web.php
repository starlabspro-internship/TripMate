<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TripController;

// Route::get('/trips', [TripController::class, 'index']);
Route::resource('trips', TripController::class);
Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::post('/trips/store', [TripController::class, 'store'])->name('trips.store');
Route::post('/trips', [TripController::class, 'store']); 
Route::get('/trips/{id}/edit', [TripController::class, 'edit']);
Route::put('/trips/{id}', [TripController::class, 'update']); 
Route::delete('/trips/{id}', [TripController::class, 'destroy']); 

Route::get('/', function () {
    return view('home');
});

Route::get('/banners', function () {
    return view('banners.index');
})
->name('banners');

//example route
Route::get( '/example', function () {
    return view('example.index');
})->name(name: "example");
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

Route::get('/icons', function () {
    return view('icons');
    });

Route::get('/cars', function () {
    return view('cars');
});


    Route::get('test-superadmin', function () {
        return 'You are a super admin!';
    })->middleware(['auth', 'super_admin']);
    
  
    


require __DIR__.'/auth.php';


