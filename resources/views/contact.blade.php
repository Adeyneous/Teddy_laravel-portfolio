@extends('layouts.app')

@section('title', 'Contact - Teddy Portfolio')

@section('content')
<div class="content-wrapper">
    <div class="contact-container">

        {{-- Success message --}}
        @if(session('message'))
            <div class="success-message">
                {{ session('message') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form id="contact-form"
              action="{{ route('contact.submit') }}"
              method="POST"
              class="contact-form">

            @csrf

            <h1>CONTACT ME</h1>
            <p>If you have any questions or concerns, please don't hesitate to contact me. I am open to any work opportunities that align with my skills and interests.</p>

            <label for="name">Your Name:</label>
            <input type="text"
                   id="name"
                   name="name"
                   required
                   maxlength="255"
                   pattern="[A-Za-z0-9\s\-']+"
                   title="Please enter a valid name"
                   value="{{ old('name', request()->cookie('user_name') ?? '') }}">

            <label for="email">Your Email:</label>
            <input type="email"
                   id="email"
                   name="email"
                   required
                   maxlength="255"
                   value="{{ old('email', request()->cookie('user_email') ?? '') }}">

            <label for="message">Your Message:</label>
            <textarea id="message"
                      name="message"
                      required
                      maxlength="65535"
                      rows="5">{{ old('message') }}</textarea>

            <div class="remember-me">
                <input type="checkbox"
                       id="remember_me"
                       name="remember_me"
                       value="yes">
                <label for="remember_me">Remember my information for next time</label>
            </div>

            {{-- reCAPTCHA hidden field --}}
            <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">

            <button type="submit" class="submit-btn">Submit</button>
        </form>

        <div class="contact-info">
            <p><img src="{{ asset('Img/email.svg') }}" alt="Email" class="icon"> TeddyKpoto@gmail.com</p>
            <p><img src="{{ asset('Img/phone.svg') }}" alt="Phone" class="icon"> 763-291-7935</p>
            <p><img src="{{ asset('Img/location.svg') }}" alt="Address" class="icon"> 7244 York Ave S, Edina, MN, 55435</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://www.google.com/recaptcha/enterprise.js?render=6LcPy90pAAAAAKW4gSPra-gSM4nYP3trZYLziDvm"></script>
<script src="{{ asset('Scripts/Contact.js') }}"></script>
@endsection
