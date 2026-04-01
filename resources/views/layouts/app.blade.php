<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <title>@yield('title', 'Teddy Portfolio')</title>
</head>
<body class="@yield('bodyClass')">

    {{-- Particles background --}}
    <div id="particles-js"></div>

    <header>
        <div class="title"><span style="color: white">Port</span><span style="color: #a020f0;">Folio</span></div>
        <button class="nav-toggle" aria-label="Toggle navigation">&#9776;</button>
        <nav id="main-nav">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ route('projects') }}">Projects</a></li>
                <li><a href="{{ url('/skills') }}">Skills</a></li>
                <li><a href="{{ url('/reviews') }}">Reviews</a></li>
            </ul>
        </nav>
    </header>

    @yield('content')

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    {{-- Particles.js --}}
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            if (typeof particlesJS !== "undefined") {
                particlesJS.load('particles-js', '/particles.json', function() {
                    console.log('particles.js loaded');
                });
            }
        });
    </script>

    @yield('scripts')

</body>
</html>