<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewReviewMail;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // 1) Validate input
        $validated = $request->validate([
            'project' => ['required', 'string', 'max:255'],
            'name'    => ['required', 'string', 'max:255', "regex:/^[A-Za-z0-9\s\-']+$/"],
            'company' => ['nullable', 'string', 'max:255'],
            'review'  => ['required', 'string', 'max:65535'],
            'g-recaptcha-response' => ['nullable', 'string'],
        ]);

        // 2) Insert into database
        DB::table('project_reviews')->insert([
            'project_name'  => $validated['project'],
            'reviewer_name' => $validated['name'],
            'company'       => $validated['company'] ?? '',
            'review_text'   => $validated['review'],
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        // 3) Send email notification
        try {
            Mail::to('TeddyKpoto@gmail.com')->send(new NewReviewMail($validated));
        } catch (\Exception $e) {
            \Log::error('Review email failed: ' . $e->getMessage());
        }

        // 4) Return response
        $redirect = redirect()->back()->with('message', 'Your review has been submitted successfully!');

        if ($request->input('remember_me') === 'yes') {
            $redirect->cookie('reviewer_name', $validated['name'], 60 * 24 * 180);
        }

        return $redirect;
    }
}