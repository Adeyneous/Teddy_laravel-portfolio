@extends('layouts.app')

@section('title', 'Skills - Teddy Portfolio')
@section('bodyClass', 'skills-page')

@section('content')
@php
/* ── Skill rings ─────────────────────────────────────── */
$skills = [
    'Frontend' => [
        'percentage' => 87,
        'description' => 'With three years of front-end development experience, my journey began at Hennepin Tech, where I delved into the intricacies of HTML, CSS, and JavaScript. These foundational classes provided me with the practical skills needed to create responsive and user-friendly web interfaces. My curiosity didn\'t stop at the classroom door; driven to expand my expertise, I independently pursued TypeScript. This self-directed learning enhanced my JavaScript knowledge, allowing me to build more robust and scalable applications.'
    ],
    'Backend' => [
        'percentage' => 74,
        'description' => 'My backend development journey began at Hennepin Tech, where I started with Python basics, advancing to more complex Python courses. The program covered practical projects using JavaScript, MySQL, T-SQL, and SQL Server, which laid a solid foundation in data management and web application development. My eagerness to learn pushed me to independently master additional technologies such as PHP, Node.js, and MongoDB, alongside other data stores like Redis, Apache Cassandra, HBase, and DynamoDB.'
    ],
    'Machine Learning' => [
        'percentage' => 77,
        'description' => 'My journey with frameworks commenced at Hennepin Tech, where I was introduced to the powerful and versatile .NET framework. This structured environment honed my ability to build robust and scalable applications. In my pursuit of expanding my technical toolkit, I independently embraced React, a modern JavaScript library for building user interfaces. This self-initiated learning allowed me to design dynamic and responsive web components.'
    ],
    'Data Analytics' => [
        'percentage' => 70,
        'description' => 'After four semesters at Hennepin Technical College, I\'m enthusiastic about furthering my education at Metropolitan State University. The summer following my second semester was a turning point when I began exploring machine learning. My aim is to pursue a Master\'s in Data Science. With a solid foundation in Python and JavaScript, I\'m eager to delve deeper into the remarkable capabilities these skills unlock.'
    ],
    'Mobile Development' => [
        'percentage' => 74,
        'description' => 'After a semester of mobile app development, my eagerness to deepen my understanding in this field led me to purchase a comprehensive book on the subject. This book has been instrumental in enhancing my skills, particularly in Kotlin, a language I had been aspiring to learn for quite some time. The knowledge I have gained has been incredibly fulfilling, and the journey into mobile app development has opened new horizons for me.'
    ],
];

/* ── Tech logos ──────────────────────────────────────── */
$logos = [
    ['image' => 'Azure.svg',      'name' => 'Azure',      'context' => 'Knowledgeable in Microsoft Azure cloud platform for hosting, databases, and enterprise services.'],
    ['image' => 'MongoDB.svg',    'name' => 'MongoDB',    'context' => 'Used MongoDB for NoSQL document storage in web application projects.'],
    ['image' => 'sql.svg',        'name' => 'SQL',        'context' => 'Proficient in SQL for querying, designing schemas, and managing relational databases including SQL Server.'],
    ['image' => 'AWS.svg',        'name' => 'AWS',        'context' => 'Experienced with AWS services including EC2, S3, Lambda, and API Gateway for hosting and serverless architectures.'],
    ['image' => 'bootstrap.svg',  'name' => 'Bootstrap',  'context' => 'Used Bootstrap for rapidly building responsive, mobile-first web layouts.'],
    ['image' => 'c.svg',          'name' => 'C#',         'context' => 'Developed applications using C# and the .NET ecosystem for robust backend solutions.'],
    ['image' => 'css.svg',        'name' => 'CSS',        'context' => 'Strong CSS skills including Flexbox, Grid, animations, and responsive design patterns.'],
    ['image' => 'html.svg',       'name' => 'HTML',       'context' => 'Solid foundation in semantic HTML5 for accessible, well-structured web pages.'],
    ['image' => 'docker.svg',     'name' => 'Docker',     'context' => 'Used Docker for containerizing applications and managing consistent development environments.'],
    ['image' => 'hadoop.svg',     'name' => 'Hadoop',     'context' => 'Studied Hadoop for big data processing and distributed storage systems.'],
    ['image' => 'python.svg',     'name' => 'Python',     'context' => 'Used Python for data analytics, scripting, machine learning experiments, and automation tasks.'],
    ['image' => 'java.svg',       'name' => 'Java',       'context' => 'Used Java for object-oriented programming coursework and backend application logic.'],
    ['image' => 'javascript.svg', 'name' => 'JavaScript', 'context' => 'Core frontend language for dynamic web interfaces, DOM manipulation, and async operations.'],
    ['image' => 'kotlin.svg',     'name' => 'Kotlin',     'context' => 'Studied Kotlin for modern JVM development and Android mobile application development.'],
    ['image' => 'react.svg',      'name' => 'React',      'context' => 'Self-taught React for building dynamic, component-based user interfaces.'],
    ['image' => 'redhat.svg',     'name' => 'RedHat',     'context' => 'Familiar with Red Hat Linux environments used in enterprise and data center infrastructure.'],
    ['image' => 'typescript.svg', 'name' => 'TypeScript', 'context' => 'Self-taught TypeScript to build more robust and type-safe JavaScript applications.'],
    ['image' => 'PostgreSQL.svg', 'name' => 'PostgreSQL', 'context' => 'Used PostgreSQL for relational data storage in backend web development projects.'],
    ['image' => 'nodejs.svg',     'name' => 'NodeJS',     'context' => 'Explored Node.js for server-side JavaScript and building REST APIs.'],
];
@endphp

<div class="sk-page">

    {{-- ── ROW 1: GitHub Stats + Skill Rings ── --}}
    <div class="sk-top-row">

        {{-- GitHub Stats --}}
        <div class="sk-card sk-github-stats">
            <h2 class="sk-card-title">GitHub Stats</h2>
            <div class="sk-stat-row">
                <div class="sk-stat">
                    <span class="sk-stat-num" id="gh-repos">–</span>
                    <span class="sk-stat-lbl">Repositories</span>
                </div>
                <div class="sk-stat">
                    <span class="sk-stat-num" id="gh-stars">–</span>
                    <span class="sk-stat-lbl">Stars</span>
                </div>
                <div class="sk-stat">
                    <span class="sk-stat-num" id="gh-followers">–</span>
                    <span class="sk-stat-lbl">Followers</span>
                </div>
                <div class="sk-stat">
                    <span class="sk-stat-num" id="gh-following">–</span>
                    <span class="sk-stat-lbl">Following</span>
                </div>
            </div>
            <p class="sk-sub-title">Most Used Languages</p>
            <div class="sk-lang-wrap">
                <canvas id="lang-chart" width="150" height="150"></canvas>
                <div id="lang-legend" class="sk-lang-legend"></div>
            </div>
        </div>

        {{-- Skill Rings --}}
        <div class="sk-card sk-rings-card">
            <h2 class="sk-card-title sk-accent">Skill Levels</h2>
            <p class="sk-rings-hint">Click a ring to read more</p>
            <div class="sk-rings-grid">
                @foreach($skills as $skill => $data)
                    @php
                        $radius        = 45;
                        $circumference = 2 * pi() * $radius;
                    @endphp
                    <div class="sk-ring-item"
                         data-skill="{{ $skill }}"
                         data-desc="{{ $data['description'] }}"
                         data-pct="{{ $data['percentage'] }}">
                        <svg width="110" height="110" viewBox="0 0 110 110">
                            <circle cx="55" cy="55" r="{{ $radius }}" fill="none" class="sk-ring-bg"/>
                            <circle cx="55" cy="55" r="{{ $radius }}" fill="none"
                                    class="sk-ring-prog"
                                    stroke-dasharray="{{ $circumference }}"
                                    stroke-dashoffset="{{ $circumference }}"/>
                            <text x="55" y="55" class="sk-ring-txt" dy=".35em"
                                  text-anchor="middle">{{ $data['percentage'] }}%</text>
                        </svg>
                        <div class="sk-ring-label">{{ $skill }}</div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    {{-- Description panel (shown when a ring is clicked) --}}
    <div id="sk-desc-panel" class="sk-desc-panel" style="display:none">
        <h3 id="sk-desc-title"></h3>
        <p id="sk-desc-text"></p>
    </div>

    {{-- ── ROW 2: GitHub Projects + Tech Grid ── --}}
    <div class="sk-mid-row">

        {{-- GitHub projects (live) --}}
        <div class="sk-card sk-projects-card">
            <h2 class="sk-card-title sk-accent">Featured Projects</h2>
            <p class="sk-rings-hint">Click a project for an AI-generated insight</p>
            <div id="projects-grid" class="sk-proj-grid">
                <div class="sk-proj-loading">Loading from GitHub…</div>
            </div>
        </div>

        {{-- Tech grid --}}
        <div class="sk-card sk-tech-card">
            <h2 class="sk-card-title sk-accent">Technologies</h2>
            <p class="sk-rings-hint">Click any icon for an AI-generated insight</p>
            <div class="sk-tech-grid">
                @foreach($logos as $logo)
                    <div class="sk-tech-item"
                         data-skill="{{ $logo['name'] }}"
                         data-context="{{ $logo['context'] }}">
                        <img src="{{ asset('Img/' . $logo['image']) }}"
                             alt="{{ $logo['name'] }}"
                             onerror="this.style.opacity='.3'">
                        <span>{{ $logo['name'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>

{{-- ── AI POPUP MODAL ── --}}
<div id="sk-modal" class="sk-modal" aria-hidden="true">
    <div class="sk-modal-box">
        <button class="sk-modal-close" id="sk-modal-close" aria-label="Close">&times;</button>
        <h3 id="sk-modal-title" class="sk-modal-title"></h3>
        <div id="sk-modal-body" class="sk-modal-body">
            <div class="sk-modal-loading">
                <span class="sk-spinner"></span> Generating insight…
            </div>
        </div>
    </div>
</div>
<div id="sk-overlay" class="sk-overlay"></div>

@endsection

@section('scripts')
    <script src="{{ asset('Scripts/skills.js') }}"></script>
@endsection