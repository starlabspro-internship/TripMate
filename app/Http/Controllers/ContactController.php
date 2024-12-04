<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryMail;
use App\Mail\ReceiveMail;
use App\Jobs\SendInquiryMail;
use App\Jobs\SendReceiveMail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('components.contact');
    }

    public function submit(Request $request)
{
    $request->validate([
        'name' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|not_regex:/http[s]?:\/\/[^\s]+/i|max:5000',
        'g-recaptcha-response' => 'required|captcha',
    ], [
        'name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please provide a valid email address.',
        'subject.required' => 'The subject field is required.',
        'message.required' => 'The message field is required.',
        'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
        'g-recaptcha-response.captcha' => 'reCAPTCHA verification failed. Please try again.',
    ]);

    $contact = Contact::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
        'recaptcha_verified' => 'verified',
    ]);
   
    SendInquiryMail::dispatch($contact)->onQueue('emails');
    SendReceiveMail::dispatch($contact)->onQueue('admin-emails');
    return back()->with('success', 'Message has been sent successfully!');
}

}
