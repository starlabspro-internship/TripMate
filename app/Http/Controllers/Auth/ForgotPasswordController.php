<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function sendVerificationCode(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $code = rand(100000, 999999);

        // Store the code in the database
        DB::table('verification_codes')->updateOrInsert(
            ['email' => $request->email],
            ['code' => $code, 'created_at' => now()]
        );

        // Send the verification code via email
        Mail::to($request->email)->send(new VerificationCodeMail($code));

        return back()->with('status', 'A verification code has been sent to your email.');
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['email' => 'required|email', 'code' => 'required']);

        $record = DB::table('verification_codes')->where('email', $request->email)->first();

        if ($record) {
            // Check if the code matches and if it's still valid
            if ($record->code == $request->code) {
                if ($record->created_at->diffInMinutes(now()) > 10) {
                    return back()->withErrors(['code' => 'Verification code has expired.']);
                }
                // Redirect to password reset page
                return redirect()->route('password.reset', ['email' => $request->email]);
            }
        }

        return back()->withErrors(['code' => 'Invalid verification code.']);
    }
}
