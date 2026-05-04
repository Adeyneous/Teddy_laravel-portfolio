@extends('layouts.app')

@section('title', 'Projects - Teddy Portfolio')

@section('content')

@php
$projects = [
    [
        'image'       => 'Pi5.png',
        'name'        => 'Bare-Metal Pi OS',
        'badge'       => 'Coming Soon',
        'description' => 'A bare-metal ARM64 operating system written from scratch for the Raspberry Pi 5. Built up in phases: custom bootloader, microkernel with scheduling and interrupt handling, MMU/paging, GPIO and NIC drivers, an in-kernel TCP/IP stack, and ultimately a minimal Type-1 hypervisor running at EL2.',
        'tags'        => ['ARM64', 'Assembly', 'C', 'Kernel', 'Pi 5'],
        'category'    => 'systems',
        'github'      => 'https://github.com/Adeyneous/pi_os',
        'demo'        => '',
    ],
    [
        'image'       => 'IDapp.png',
        'name'        => 'ID Info',
        'badge'       => 'Coming Soon',
        'description' => 'End-to-end OCR pipeline that extracts structured field data from US driver license photos. Two custom-trained PyTorch models — one for ID localization, one for field-level text recognition — deployed on AWS SageMaker behind a serverless inference endpoint, with a browser-based capture UI.',
        'tags'        => ['PyTorch', 'SageMaker', 'OCR', 'AWS'],
        'category'    => 'ml',
        'github'      => 'https://github.com/Adeyneous/ID-Info',
        'demo'        => '',
    ],
    [
        'image'       => 'MVP.png',
        'name'        => 'InfraSight',
       'badge'       =>  'Coming Soon',
        'description' => 'Hardware telemetry and analytics platform running on a Raspberry Pi and repurposed laptop cluster. Ingests server logs to detect PCIe link failures, BDF errors, NIC resets, and ECC memory issues, surfacing trends and unstable hosts through an interactive dashboard.',
        'tags'        => ['Java', 'Spring Boot', 'TimescaleDB', 'Grafana', 'Raspberry Pi'],
        'category'    => 'systems',
        'github'      => 'https://github.com/Adeyneous/MVP_telemetry',
        'demo'        => '',
    ],
    
    [
        'image'       => 'azure-data.png',
        'name'        => 'Azure Data',
        'badge'       => 'Coming Soon',
        'description' => 'End-to-end data solution migrating an on-premise SQL Server database to Azure, implementing Data Factory pipelines, Synapse Analytics, and Power BI dashboards.',
        'tags'        => ['Azure', 'SQL Server', 'Data Factory'],
        'category'    => 'data',
        'github'      => 'https://github.com/Adeyneous/Azure-Data-.git',
        'demo'        => '',
    ],
    [
        'image'       => 'mob.png',
        'name'        => 'Diet Tracker',
        'badge'       => 'Coming Soon',
        'description' => 'A local-first Android app for tracking daily water intake and meals, with nutritional breakdowns, progress trends, and configurable reminders. Built with Kotlin and Jetpack Compose, designed to feel native to Android',
        'tags'        => ['Kotlin', 'Jetpack Compose', 'Room', 'Android'],
        'category'    => 'mobile',
        'github'      => 'https://github.com/Adeyneous/Diet-Tracker',
        'demo'        => '',
    ],
];
@endphp

<div class="proj-page">

    {{-- ── Page header ── --}}
    <div class="proj-header">
        <h1 class="proj-title">Projects</h1>
        <p class="proj-subtitle">A selection of work spanning web, mobile, data, machine learning, and low-level systems.</p>
    </div>

    {{-- ── Filter tabs ── --}}
    <div class="proj-filters" id="proj-filters">
        <button class="proj-filter active" data-filter="all">All</button>
        <button class="proj-filter" data-filter="web">Web</button>
        <button class="proj-filter" data-filter="mobile">Mobile</button>
        <button class="proj-filter" data-filter="data">Data</button>
        <button class="proj-filter" data-filter="ml">ML</button>
        <button class="proj-filter" data-filter="systems">Systems</button>
        <button class="proj-filter" data-filter="opensource">Open Source</button>
    </div>

    {{-- ── Project grid ── --}}
    <div class="proj-grid" id="proj-grid">

        @foreach($projects as $project)
        <div class="proj-card" data-category="{{ $project['category'] }}">

            {{-- Image --}}
            <div class="proj-img-wrap">
                <img src="{{ asset('Img/' . $project['image']) }}" alt="{{ $project['name'] }}">
                @if($project['badge'])
                    <span class="proj-badge">{{ $project['badge'] }}</span>
                @endif
            </div>

            {{-- Body --}}
            <div class="proj-body">
                <h3 class="proj-name">{{ $project['name'] }}</h3>
                <p class="proj-desc">{{ $project['description'] }}</p>

                {{-- Tech tags --}}
                <div class="proj-tags">
                    @foreach($project['tags'] as $tag)
                        <span class="proj-tag">{{ $tag }}</span>
                    @endforeach
                </div>

                {{-- Links --}}
                <div class="proj-links">
                    @if($project['github'])
                        <a href="{{ $project['github'] }}" target="_blank" class="proj-btn proj-btn-outline">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/>
                            </svg>
                            GitHub
                        </a>
                    @endif
                    @if($project['demo'])
                        <a href="{{ $project['demo'] }}" target="_blank" class="proj-btn proj-btn-primary">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                                <polyline points="15 3 21 3 21 9"/>
                                <line x1="10" y1="14" x2="21" y2="3"/>
                            </svg>
                            Live Demo
                        </a>
                    @endif
                    @if(!$project['github'] && !$project['demo'])
                        <span class="proj-btn proj-btn-disabled">Coming Soon</span>
                    @endif
                </div>
            </div>

        </div>
        @endforeach

    </div>

    {{-- ── Open Source Contributions card (auto-populated from GitHub API) ── --}}
    <div class="proj-card proj-card-oss" data-category="opensource">
    <div class="proj-img-wrap proj-img-oss">
        <svg viewBox="0 0 24 24" fill="currentColor" width="64" height="64">
            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/>
        </svg>
        <span class="proj-badge proj-badge-live">Live</span>
    </div>

    <div class="proj-body">
        <h3 class="proj-name">Open Source Contributions</h3>
        <p class="proj-desc">Pull requests I've opened to public repositories I don't own. This card auto-updates from the GitHub API as I contribute.</p>

        <div id="oss-pr-list" class="oss-pr-list">
            <div class="oss-loading">Loading recent contributions…</div>
        </div>

        <div class="proj-links">
            <a href="https://github.com/Adeyneous?tab=overview" target="_blank" class="proj-btn proj-btn-outline">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/>
                </svg>
                View All on GitHub
            </a>
            </div>
        </div>
    </div>

    {{-- Empty state (shown when filter has no matches) --}}
    <div id="proj-empty" class="proj-empty" style="display:none">
        <p>No projects in this category yet — check back soon.</p>
    </div>

</div>

@endsection

@section('scripts')
<script>
// ── Filter tabs ──────────────────────────────────────
const filters = document.querySelectorAll('.proj-filter');
const cards   = document.querySelectorAll('.proj-card');
const empty   = document.getElementById('proj-empty');

filters.forEach(btn => {
    btn.addEventListener('click', () => {
        filters.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const cat = btn.dataset.filter;
        let visible = 0;

        cards.forEach(card => {
            const show = cat === 'all' || card.dataset.category === cat;
            card.style.display = show ? 'flex' : 'none';
            if (show) visible++;
        });

        empty.style.display = visible === 0 ? 'block' : 'none';
    });
});

// ── Open Source PRs (auto-populated from GitHub) ─────
const GITHUB_USER  = 'Adeyneous';
const OSS_CACHE_KEY = 'oss-prs-cache';
const OSS_CACHE_MS  = 60 * 60 * 1000; // 1 hour

function escapeHTML(s) {
    return String(s).replace(/[&<>"']/g, c => ({
        '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'
    }[c]));
}

function renderPRs(list, items) {
    if (!items.length) {
        list.innerHTML = '<div class="oss-empty">First contribution coming soon!</div>';
        return;
    }
    list.innerHTML = items.slice(0, 3).map(pr => {
        const repo   = pr.repository_url.split('/').slice(-2).join('/');
        const merged = pr.pull_request?.merged_at;
        const status = merged ? 'merged' : (pr.state === 'closed' ? 'closed' : 'open');
        const icon   = status === 'merged' ? '✓' : (status === 'closed' ? '✕' : '◯');
        const date   = new Date(pr.created_at).toLocaleDateString('en-US',
            { month: 'short', day: 'numeric', year: 'numeric' });

        return `
            <a href="${escapeHTML(pr.html_url)}" target="_blank" class="oss-pr oss-pr-${status}">
                <div class="oss-pr-row">
                    <span class="oss-pr-status">${icon}</span>
                    <span class="oss-pr-repo">${escapeHTML(repo)}</span>
                    <span class="oss-pr-date">${date}</span>
                </div>
                <div class="oss-pr-title">${escapeHTML(pr.title)}</div>
            </a>`;
    }).join('');
}

async function loadOpenSourcePRs() {
    const list = document.getElementById('oss-pr-list');
    if (!list) return;

    // Try localStorage cache first (avoids GitHub rate limits)
    try {
        const cached = JSON.parse(localStorage.getItem(OSS_CACHE_KEY) || 'null');
        if (cached && (Date.now() - cached.at) < OSS_CACHE_MS) {
            renderPRs(list, cached.data);
            return;
        }
    } catch (_) {}

    try {
        const url = `https://api.github.com/search/issues?q=author:${GITHUB_USER}+type:pr+is:public+-user:${GITHUB_USER}&sort=created&order=desc&per_page=3`;
        const res = await fetch(url);
        const data = await res.json();
        const items = data.items || [];
        renderPRs(list, items);
        localStorage.setItem(OSS_CACHE_KEY, JSON.stringify({ data: items, at: Date.now() }));
    } catch (e) {
        list.innerHTML = '<div class="oss-empty">Could not load contributions right now.</div>';
    }
}

loadOpenSourcePRs();
</script>
@endsection