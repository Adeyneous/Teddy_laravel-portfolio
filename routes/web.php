<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;

// Home
Route::get('/', function () {
    return view('home');
});

// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Projects
Route::get('/projects', function () {
    return view('projects');
})->name('projects');

// Skills
Route::get('/skills', function () {
    return view('skills');
})->name('skills');

// Reviews
Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact.show');

Route::post('/contact/submit', [ContactController::class, 'store'])
    ->name('contact.submit');

// Reviews submit
Route::post('/reviews/submit', [ReviewController::class, 'store'])
    ->name('reviews.submit');

// Download resume
Route::post('/download-resume', function () {
    $path = public_path('Resume/Adeyneous_Kpoto_Updated Resume2.docx');
    abort_unless(file_exists($path), 404);
    return response()->download($path);
})->name('download.resume');
