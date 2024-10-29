<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use Exception;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            Log::info('Google User Data: ', (array) $user);
            $authUser = User::firstOrCreate(
                ['google_id' => $user->id],
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'password' => bcrypt('default_password')
                ],
            );
            Auth::login($authUser);
            return redirect('/');
        } catch (Exception $e) {
            Log::error('Google authentication error: ' . $e->getMessage());
            return redirect('/login')->withErrors('Google authentication failed!');
        }
    }
}


// 'name' => $user->name,
// 'lastname' => $user->lastname,
// 'email' => $user->email,
// 'phone' => $user->phone,
// 'birthday' => $user->birthday,
// 'birthday' => $user->birthday,
// 'city' => $user->city,
// 'password' => bcrypt('default_password')