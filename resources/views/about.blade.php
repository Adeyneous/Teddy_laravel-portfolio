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
                Welcome! My story starts in Liberia, where I was born and spent the first eleven years of my life
                before moving to the United States. That early move shaped who I am — it taught me that growth
                often means stepping into the unfamiliar, and that curiosity is the best companion for any new chapter.
            </p>
            <p class="about-bio">
                Family is at the heart of everything I do. I'm a proud dad of three amazing kids, with another little
                one on the way. Most of my favorite moments happen right at home — playing, telling stories, or just
                figuring out the world together. They keep me grounded, and they're the reason I work as hard as I do.
            </p>
            <p class="about-bio">
                When I'm not with my family, you'll usually find me lost in a good book or a great story. I'm drawn
                to history and philosophy — there's something powerful about understanding where we've been and what
                shapes the way we think. I'm also a lifelong fantasy fan: <em>The Lord of the Rings</em>, the
                <em>Inheritance Cycle</em>, and the <em>Wheel of Time</em> series all sit high on my list. That love
                of stories carries over into my career too — one of my favorite things about computer science is that
                there's always something new to learn. The journey never really ends, and that's exactly how I like it.
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
                <div class="about-edu-school">Machine Learning · Firmware Engineering · MIPS Assembly · ARM Assembly · Networking</div>
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