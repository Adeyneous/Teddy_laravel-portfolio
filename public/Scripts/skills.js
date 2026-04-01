// ═══════════════════════════════════════════════════════
//  CONFIG  ← update AWS_AI_ENDPOINT after AWS setup
// ═══════════════════════════════════════════════════════
const GITHUB_USERNAME = 'Adeyneous';
const AWS_AI_ENDPOINT = 'YOUR_API_GATEWAY_URL';

// ═══════════════════════════════════════════════════════
//  COUNT-UP ANIMATION  (kept from original skills.js)
//  Ticks the number inside the ring from 0 → target %
// ═══════════════════════════════════════════════════════
function animatePercentage(element, percentage) {
    let current = 0;
    const textEl = element.querySelector('.sk-ring-txt');
    const interval = setInterval(() => {
        if (current >= percentage) {
            clearInterval(interval);
        } else {
            current++;
            textEl.textContent = current + '%';
        }
    }, 10);
}

// ═══════════════════════════════════════════════════════
//  SKILL RINGS  – animate stroke + count-up on load,
//                click to show description panel
// ═══════════════════════════════════════════════════════
document.querySelectorAll('.sk-ring-item').forEach(item => {
    const prog   = item.querySelector('.sk-ring-prog');
    const pct    = parseFloat(item.dataset.pct);
    const circ   = 2 * Math.PI * 45;
    const offset = circ - (pct / 100) * circ;

    // Animate ring stroke + count-up together on page load
    setTimeout(() => {
        prog.style.transition = 'stroke-dashoffset 1.2s ease-out';
        prog.style.strokeDashoffset = offset;
        animatePercentage(item, pct);
    }, 200);

    // Click → show description panel
    item.addEventListener('click', () => {
        document.querySelectorAll('.sk-ring-item').forEach(el => el.classList.remove('active'));
        item.classList.add('active');

        const panel = document.getElementById('sk-desc-panel');
        document.getElementById('sk-desc-title').textContent = item.dataset.skill;
        document.getElementById('sk-desc-text').textContent  = item.dataset.desc;
        panel.style.display = 'block';
        panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    });
});

// ═══════════════════════════════════════════════════════
//  GITHUB DATA
// ═══════════════════════════════════════════════════════
async function loadGitHub() {
    try {
        const [user, repos] = await Promise.all([
            fetch(`https://api.github.com/users/${GITHUB_USERNAME}`).then(r => r.json()),
            fetch(`https://api.github.com/users/${GITHUB_USERNAME}/repos?per_page=100`).then(r => r.json())
        ]);

        document.getElementById('gh-repos').textContent     = user.public_repos ?? '–';
        document.getElementById('gh-followers').textContent = user.followers     ?? '–';
        document.getElementById('gh-following').textContent = user.following     ?? '–';

        if (Array.isArray(repos)) {
            const stars = repos.reduce((s, r) => s + (r.stargazers_count || 0), 0);
            document.getElementById('gh-stars').textContent = stars;
            buildLanguageChart(repos);
            buildProjectCards(repos);
        }
    } catch (e) {
        console.warn('GitHub API error:', e);
    }
}

function buildLanguageChart(repos) {
    const counts = {};
    repos.forEach(r => { if (r.language) counts[r.language] = (counts[r.language] || 0) + 1; });
    const total  = Object.values(counts).reduce((a, b) => a + b, 0);
    const sorted = Object.entries(counts).sort((a, b) => b[1] - a[1]).slice(0, 6);
    const COLORS = ['#06b6d4', '#8b5cf6', '#f59e0b', '#ef4444', '#22c55e', '#ec4899'];

    const canvas = document.getElementById('lang-chart');
    const ctx    = canvas.getContext('2d');
    let angle    = -Math.PI / 2;
    const cx = 75, cy = 75, r = 65, inner = 32;

    sorted.forEach(([, count], i) => {
        const slice = (count / total) * Math.PI * 2;
        ctx.beginPath();
        ctx.moveTo(cx, cy);
        ctx.arc(cx, cy, r, angle, angle + slice);
        ctx.closePath();
        ctx.fillStyle = COLORS[i % COLORS.length];
        ctx.fill();
        angle += slice;
    });

    // Donut hole
    ctx.beginPath();
    ctx.arc(cx, cy, inner, 0, Math.PI * 2);
    ctx.fillStyle = '#111827';
    ctx.fill();

    document.getElementById('lang-legend').innerHTML = sorted.map(([lang, count], i) =>
        `<div class="sk-legend-item">
            <span class="sk-legend-dot" style="background:${COLORS[i]}"></span>
            <span>${lang} ${Math.round(count / total * 100)}%</span>
         </div>`
    ).join('');
}

function buildProjectCards(repos) {
    const grid = document.getElementById('projects-grid');
    const top  = repos
        .filter(r => !r.fork)
        .sort((a, b) => b.stargazers_count - a.stargazers_count)
        .slice(0, 4);

    if (!top.length) {
        grid.innerHTML = '<p style="color:#94a3b8">No public repos found.</p>';
        return;
    }

    grid.innerHTML = top.map(r => `
        <div class="sk-proj-card" style="cursor:pointer"
             data-skill="${r.name}"
             data-context="GitHub repo: ${r.description || r.name}. Language: ${r.language || 'unknown'}. Stars: ${r.stargazers_count}.">
            <div class="sk-proj-name">${r.name}</div>
            <p class="sk-proj-desc">${r.description || 'No description provided.'}</p>
            <div class="sk-proj-tags">
                ${r.language ? `<span class="sk-proj-tag">${r.language}</span>` : ''}
            </div>
            <div class="sk-proj-meta">
                <span>⭐ ${r.stargazers_count}</span>
                <span>🔀 ${r.forks_count}</span>
                <a href="${r.html_url}" target="_blank" onclick="event.stopPropagation()" class="sk-proj-link">↗</a>
            </div>
        </div>`
    ).join('');

    grid.querySelectorAll('.sk-proj-card').forEach(card => {
        card.addEventListener('click', () => openModal(card.dataset.skill, card.dataset.context));
    });
}

// ═══════════════════════════════════════════════════════
//  AI MODAL
// ═══════════════════════════════════════════════════════
const modal   = document.getElementById('sk-modal');
const overlay = document.getElementById('sk-overlay');
const cache   = {};

async function openModal(skill, context) {
    document.getElementById('sk-modal-title').textContent = skill;
    document.getElementById('sk-modal-body').innerHTML =
        '<div class="sk-modal-loading"><span class="sk-spinner"></span> Generating insight…</div>';
    modal.setAttribute('aria-hidden', 'false');
    modal.classList.add('active');
    overlay.classList.add('active');

    if (cache[skill]) {
        document.getElementById('sk-modal-body').innerHTML = `<p>${cache[skill]}</p>`;
        return;
    }

    try {
        const res = await fetch(AWS_AI_ENDPOINT, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                skill,
                context,
                prompt: `You are a professional portfolio assistant for Adeyneous Teddy Kpoto, an IT professional and Data Center Technician.
Write a concise 2-3 sentence paragraph about his experience with: "${skill}".
Context: ${context}
Tone: professional, first-person, confident. No bullet points. Flowing prose only.`
            })
        });
        const data = await res.json();
        const text = data.text || data.body || 'Could not generate insight right now.';
        cache[skill] = text;
        document.getElementById('sk-modal-body').innerHTML = `<p>${text}</p>`;
    } catch {
        // Graceful fallback until AWS is configured
        const fallback = `${context} This is part of my growing technical toolkit as I continue building robust, scalable solutions across hardware and software domains.`;
        cache[skill] = fallback;
        document.getElementById('sk-modal-body').innerHTML = `<p>${fallback}</p>`;
    }
}

function closeModal() {
    modal.setAttribute('aria-hidden', 'true');
    modal.classList.remove('active');
    overlay.classList.remove('active');
}

document.getElementById('sk-modal-close').addEventListener('click', closeModal);
overlay.addEventListener('click', closeModal);
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

// Tech item click listeners
document.querySelectorAll('.sk-tech-item').forEach(el => {
    el.addEventListener('click', () => openModal(el.dataset.skill, el.dataset.context));
});

// Boot
loadGitHub();
  







