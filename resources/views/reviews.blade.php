@extends('layouts.app')

@section('title', 'Project Review')

@section('content')
<div class="content-wrapper">
    <div class="review-form-container">

        {{-- Success message --}}
        @if(session('message'))
            <div class="success-message">{{ session('message') }}</div>
        @endif

        {{-- Errors --}}
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="error-message">{{ $error }}</div>
            @endforeach
        @endif

        <form id="review-form" action="{{ route('reviews.submit') }}" method="POST" class="review-form">
            @csrf

            <h1>Project Review</h1>
            <p>Please share your experience with one of my projects. Your feedback is valuable!</p>

            <label for="project-select">Choose a project to review:</label>
            <select id="project-select" name="project" required>
                <option value="">--Please choose an option--</option>
                <option value="Neous HM" {{ old('project')=='Neous HM' ? 'selected' : '' }}>Neous HM</option>
                <option value="ID Info" {{ old('project')=='ID Info' ? 'selected' : '' }}>ID info</option>
                <option value="Home Credit" {{ old('project')=='Home Credit' ? 'selected' : '' }}>Home Credit</option>
                <option value="Home Credit Web" {{ old('project')=='Home Credit Web' ? 'selected' : '' }}>Home Credit Web app</option>
                <option value="Azure Data" {{ old('project')=='Azure Data' ? 'selected' : '' }}>Azure Data</option>
                <option value="Diet Tracker" {{ old('project')=='Diet Tracker' ? 'selected' : '' }}>Diet Tracker</option>
            </select>

            <label for="name">Your Name:</label>
            <input type="text"
                   id="name"
                   name="name"
                   required
                   maxlength="255"
                   pattern="[A-Za-z0-9\s\-']+"
                   title="Please enter a valid name"
                   placeholder="Enter your name"
                   value="{{ old('name', request()->cookie('reviewer_name')) }}">

            <label for="company">Company:</label>
            <input type="text"
                   id="company"
                   name="company"
                   placeholder="Enter your company"
                   value="{{ old('company') }}">

            <label for="review">Review:</label>
            <textarea id="review"
                      name="review"
                      required
                      placeholder="Write your review here..."
                      rows="4">{{ old('review') }}</textarea>

            <div class="remember-me">
                <input type="checkbox" id="remember_me" name="remember_me" value="yes" {{ old('remember_me') ? 'checked' : '' }}>
                <label for="remember_me">Remember my name for next time</label>
            </div>

            {{-- reCAPTCHA v2 widget --}}
            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>

            <div class="form-buttons">
                <button type="button" onclick="resetForm()" class="cancel-button">Cancel</button>
                <button type="submit" class="submit-button">Submit Review</button>
            </div>
        </form>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
document.getElementById('review-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const project = document.getElementById('project-select').value.trim();
    const name = document.getElementById('name').value.trim();
    const review = document.getElementById('review').value.trim();

    if (!project || !name || !review) {
        alert('Please fill in all required fields');
        return;
    }

    const nameRegex = /^[A-Za-z0-9\s\-']+$/;
    if (!nameRegex.test(name)) {
        alert('Please enter a valid name');
        return;
    }

    this.submit();
});

function resetForm() {
    if (confirm('Are you sure you want to clear the form?')) {
        document.getElementById('review-form').reset();
    }
}
</script>

@endsection