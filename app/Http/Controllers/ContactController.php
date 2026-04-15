<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Mail\NewContactMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 1) Validate input
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:255', "regex:/^[A-Za-z0-9\s\-']+$/"],
            'email'   => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:65535'],
            'g-recaptcha-response' => ['required', 'string'],
        ]);

        // 2) Verify reCAPTCHA token with Google
        $recaptchaToken = $request->input('g-recaptcha-response');
        \Log::info('Token received: ' . $recaptchaToken);
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => config('services.recaptcha.secret'),
            'response' => $recaptchaToken,
            'remoteip' => $request->ip(),
        ]);

        $recaptchaData = $response->json();

        \Log::info('reCAPTCHA response: ' . json_encode($recaptchaData));

        if (!$recaptchaData['success']) {
            return back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed. Please try again.']);
        }

         // 3) Save to database
        DB::table('contact_submissions')->insert([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'message'    => $validated['message'],
            'ip_address' => $request->ip(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4) Send email notification
        try {
            Mail::to('TeddyKpoto@gmail.com')->send(new NewContactMail($validated));
        } catch (\Exception $e) {
            \Log::error('Contact email failed: ' . $e->getMessage());
        }

        // 5) Handle cookies for "remember me"
        $redirect = redirect()->back()->with('message', 'Your message has been sent successfully!');

        if ($request->input('remember_me') === 'yes') {
            return $redirect
                ->cookie('user_name', $validated['name'], 60 * 24 * 180)
                ->cookie('user_email', $validated['email'], 60 * 24 * 180);
        }

        return $redirect;
    }
}
