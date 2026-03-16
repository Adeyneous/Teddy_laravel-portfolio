<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
            'g-recaptcha-response' => ['nullable', 'string'],
        ]);

        // 2) Save to database
        DB::table('contact_submissions')->insert([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'message'    => $validated['message'],
            'ip_address' => $request->ip(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3) Send email notification
        try {
            Mail::to('TeddyKpoto@gmail.com')->send(new NewContactMail($validated));
        } catch (\Exception $e) {
            // Log the error but don't prevent the form from submitting
            \Log::error('Contact email failed: ' . $e->getMessage());
        }

        // 4) Handle cookies for "remember me"
        $redirect = redirect()->back()->with('message', 'Your message has been sent successfully!');

        if ($request->input('remember_me') === 'yes') {
            $redirect->cookie('user_name', $validated['name'], 60 * 24 * 180);
            $redirect->cookie('user_email', $validated['email'], 60 * 24 * 180);
        }

        return $redirect;
    }
}