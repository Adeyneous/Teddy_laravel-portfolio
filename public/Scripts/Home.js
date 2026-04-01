/* ═══════════════════════════════════════════════════════
   CODE BLOCK  – dot switching + auto-cycle (unchanged)
   ═══════════════════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', function () {
    const formattedCodeText = document.getElementById('formatted-code-text');
    const dots              = document.querySelectorAll('.hm-dot');
    const formatData        = document.querySelectorAll('#format-data > div');
    const langLabel         = document.getElementById('hm-lang-label');
    let currentDot          = 'red-dot';

    function decodeHtmlEntities(value) {
        return new DOMParser()
            .parseFromString(value, 'text/html')
            .documentElement.textContent;
    }

    function setFormat(dotId) {
        const node = document.querySelector(`#format-data > div[data-id='${dotId}']`);
        if (!node) return;

        const decoded = decodeHtmlEntities(node.getAttribute('data-description') || '');
        if (formattedCodeText) formattedCodeText.textContent = decoded;

        // Update language label in the title bar
        if (langLabel) langLabel.textContent = node.getAttribute('data-lang') || '';

        // Highlight the active dot
        dots.forEach(d => d.classList.remove('active'));
        const activeDot = document.querySelector(`.hm-dot[data-id='${dotId}']`);
        if (activeDot) activeDot.classList.add('active');
    }

    // Initialise with first snippet
    setFormat(currentDot);

    // Click to switch
    dots.forEach(dot => {
        dot.addEventListener('click', function () {
            const dotId = this.getAttribute('data-id');
            if (!dotId) return;
            currentDot = dotId;
            setFormat(dotId);
        });
    });

    // Auto-cycle every 5 seconds
    if (formatData.length > 0) {
        setInterval(() => {
            const keys  = Array.from(formatData).map(d => d.getAttribute('data-id'));
            const index = (keys.indexOf(currentDot) + 1) % keys.length;
            currentDot  = keys[index];
            setFormat(currentDot);
        }, 5000);
    }
});


/* ═══════════════════════════════════════════════════════
   TYPING ANIMATION  (unchanged)
   ═══════════════════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', function () {
    const phrases   = ['Frontend Development', 'Backend Development', 'Mobile App Development', 'Machine Learning'];
    let phraseIndex = 0;
    let charIndex   = 0;
    let deleting    = false;

    const dynamicText = document.getElementById('dynamic-text');
    if (!dynamicText) return;

    function type() {
        const full = phrases[phraseIndex];
        deleting ? charIndex-- : charIndex++;
        dynamicText.textContent = full.substring(0, charIndex);

        if (!deleting && charIndex === full.length) {
            setTimeout(() => { deleting = true; type(); }, 1200);
            return;
        }
        if (deleting && charIndex <= 0) {
            deleting     = false;
            phraseIndex  = (phraseIndex + 1) % phrases.length;
        }

        setTimeout(type, deleting ? 100 : 200 + Math.random() * 100);
    }

    setTimeout(type, 500);
});


/* ═══════════════════════════════════════════════════════
   GITHUB STAT CHIPS  (new — fetches repo + follower count)
   ═══════════════════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', async function () {
    try {
        const res  = await fetch('https://api.github.com/users/Adeyneous');
        const data = await res.json();
        const reposEl     = document.getElementById('hm-repos');
        const followersEl = document.getElementById('hm-followers');
        if (reposEl)     reposEl.textContent     = data.public_repos ?? '–';
        if (followersEl) followersEl.textContent = data.followers    ?? '–';
    } catch (e) {
        console.warn('GitHub stat fetch failed:', e);
    }
});


/* ═══════════════════════════════════════════════════════
   CONTACT REDIRECT  (unchanged)
   ═══════════════════════════════════════════════════════ */
function redirectToContact(url) {
    window.location.href = url;
}


/* ═══════════════════════════════════════════════════════
   PARTICLES.JS  (unchanged — safe no-op if not loaded)
   ═══════════════════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', function () {
    if (typeof particlesJS !== 'undefined') {
        particlesJS.load('particles-js', '/particles.json', function () {
            console.log('particles.js loaded');
        });
    }
});

