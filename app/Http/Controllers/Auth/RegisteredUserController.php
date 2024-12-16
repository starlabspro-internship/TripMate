<?php

namespace App\Http\Controllers\Auth;

use App\Models\City;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $cities = City::orderBy('name', 'asc')->get();
        return view('auth.register', compact('cities'));
    }


    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the input fields
        $request->validate([
            'image' => ['required', 'image', 'max:10240'],
            'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'lastname' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'min:8', 'max:20', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'confirmed'],
            'phone' => ['nullable', 'string', 'regex:/^\+?[0-9\s-]*$/', 'max:20'],
            'birthday' => ['nullable', 'date', 'before:' . now()->subYears(16)->toDateString()],
            'city' => ['required', 'exists:cities,id'],
            'gender' => ['required', 'in:male,female'],
            // 'g-recaptcha-response' => ['required', 'captcha'],
        ], [
            'name.regex' => 'The first name should only contain letters and spaces.',
            'lastname.regex' => 'The last name should only contain letters and spaces.',
            'password.regex' => 'The password must include uppercase, lowercase, and numbers.',
            'phone.regex' => 'The phone number format is invalid.',
            'birthday.before' => 'You must be at least 16 years old to register.',
            'image.mimes' => 'The profile picture must be a JPG, JPEG, or PNG file.',
            'image.max' => 'The profile picture must be smaller than 2MB.',
        ]);

        // Store profile picture
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('profile', 'public');
        } else {
            return redirect()->back()->with('error', 'No valid file uploaded.');
        }

        // Generate a random 6-character verification code
        $verificationCode = Str::random(6);
        $cityName = City::where('id', $request->city)->value('name');
        // Prepare user data
        $userData = [
            'image' => $path,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'city' => $cityName,
            'gender' => $request->gender,
            'recaptcha_verified' => true,
            'email_verification_code' => $verificationCode,
        ];

        // Create or update the user
        $user = User::updateOrCreate(
            ['email' => $request->email],
            $userData
        );

        // Fire registered event and login user
        event(new Registered($user));
        Auth::login($user);

        // Redirect to code entry page
        return redirect(route('enter-code'));
    }


}
