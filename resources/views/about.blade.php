@extends('layouts.app')

@section('title', 'About - Teddy Portfolio')

@section('content')
<div class="about-page">

    {{-- ── HERO SECTION ── --}}
    <div class="about-hero fade-up">

        <div class="about-profile-wrap">
            <div class="about-profile-ring">
                <img src="{{ asset('Img/IMG_4998.jpg') }}" alt="Adeyneous Teddy Kpoto" />
            </div>
            <p class="about-profile-name">Adeyneous Teddy Kpoto</p>
            <span class="about-status-badge">Open to Opportunities</span>
        </div>

        <div class="about-hero-text">
            <p class="about-tagline">Database Management &middot; Software Development</p>
            <h1 class="about-greeting">Hello,<br>I'm Teddy.</h1>

            <p class="about-bio">
                Welcome! I'm a dedicated IT professional specializing in Database Management and Software Development,
                currently pursuing a Bachelor's degree in Computer Science at Metro State University.
                My journey began at Hennepin Technical College, where I earned an Associate's degree in
                SQL Server Software Development — building the solid foundation that launched my career.
            </p>
            <p class="about-bio">
                In the tech trenches, I've contributed to numerous projects that showcase my ability to manage
                complex databases <em>and</em> develop robust software solutions. I take pride in translating
                intricate data into actionable insights and writing clean, efficient code. My drive for continuous
                learning pushed me to independently explore React, Node.js, PHP, and TypeScript.
            </p>
            <p class="about-bio">
                I'm passionate about leveraging technology to solve real-world problems and improve business outcomes.
                My goal is to join a forward-thinking company where I can contribute to challenging projects and grow
                as part of a dynamic team — bringing technical prowess, strategic thinking, and a collaborative spirit.
            </p>

            <div class="about-facts">
                <div class="about-fact-chip">📍 <strong>South Bend, IN</strong></div>
                <div class="about-fact-chip">🎓 <strong>Indiana University</strong></div>
                <div class="about-fact-chip">💼 <strong>2+ yrs experience</strong></div>
                <div class="about-fact-chip">☁️ <strong>AWS · Azure</strong></div>
            </div>
        </div>

    </div>

    <div class="about-divider"></div>

    {{-- ── EDUCATION ── --}}
    <div class="about-section fade-up">
        <p class="about-section-label">Education</p>
        <div class="about-edu-grid">
            <div class="about-edu-card">
                <div class="about-edu-year">2022 – Present</div>
                <div class="about-edu-degree">B.S. Computer Science</div>
                <div class="about-edu-school">Indiana University</div>
            </div>
            <div class="about-edu-card">
                <div class="about-edu-year">2022 – 2025</div>
                <div class="about-edu-degree">B.S. Computer Science</div>
                <div class="about-edu-school">Metro State University</div>
            </div>
            <div class="about-edu-card">
                <div class="about-edu-year">2020 – 2022</div>
                <div class="about-edu-degree">A.S. SQL Server Software Development</div>
                <div class="about-edu-school">Hennepin Technical College</div>
            </div>
            <div class="about-edu-card">
                <div class="about-edu-year">Ongoing</div>
                <div class="about-edu-degree">Self-Directed Learning</div>
                <div class="about-edu-school">Machine Learning · Firmware Engineering · PHP · MIPS Assembly · ARM Assembly · Networking</div>
            </div>
        </div>
    </div>

    {{-- ── CTA ── --}}
    <div class="about-cta fade-up">
        <h2>Let's Build Something Great</h2>
        <p>I'm always open to new challenges, collaborations, and conversations. If you're looking for a tech enthusiast ready to make a tangible impact — let's connect.</p>
        <a href="{{ route('contact.show') }}" class="about-cta-btn">✉ Get in Touch</a>
    </div>

</div>

<script>
const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.12 });
document.querySelectorAll('.fade-up').forEach(el => io.observe(el));
</script>
@endsection