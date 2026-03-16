/* Home */

document.addEventListener('DOMContentLoaded', function () {
  const formattedCodeText = document.getElementById('formatted-code-text');
  const dots = document.querySelectorAll('.dot');
  const formatData = document.querySelectorAll('#format-data > div');
  let currentDot = 'red-dot';

  function decodeHtmlEntities(value) {
    return new DOMParser()
      .parseFromString(value, "text/html")
      .documentElement.textContent;
  }

  function setFormat(dotId) {
    const node = document.querySelector(`#format-data > div[data-id='${dotId}']`);
    if (!node) return;

    const value = node.getAttribute('data-description') || '';
    const decoded = decodeHtmlEntities(value);

    if (formattedCodeText) {
      formattedCodeText.textContent = decoded;
    }
  }

  // Initialize first snippet
  setFormat(currentDot);

  dots.forEach(dot => {
    dot.addEventListener('click', function () {
      const dotId = this.getAttribute('data-id');
      if (!dotId) return;
      currentDot = dotId;
      setFormat(dotId);
    });
  });

  // Auto cycle
  if (formatData.length > 0) {
    setInterval(() => {
      const dotKeys = Array.from(formatData).map(div => div.getAttribute('data-id'));
      let index = dotKeys.indexOf(currentDot);
      index = (index + 1) % dotKeys.length;
      currentDot = dotKeys[index];
      setFormat(currentDot);
    }, 5000);
  }
});


/* Welcome Message */

document.addEventListener('DOMContentLoaded', function () {
  const phrases = ["Frontend Development", "Backend Development", "Mobile App Development", "Machine Learning"];
  let currentPhrase = 0;
  let currentCharacter = 0;
  let deleting = false;

  const dynamicText = document.getElementById('dynamic-text');
  if (!dynamicText) return;

  function type() {
    const wait = 200 + Math.random() * 100;

    const full = phrases[currentPhrase];

    if (deleting) {
      currentCharacter--;
    } else {
      currentCharacter++;
    }

    dynamicText.textContent = full.substring(0, currentCharacter);

    if (!deleting && currentCharacter === full.length) {
      setTimeout(() => {
        deleting = true;
        type();
      }, 1200);
      return;
    }

    if (deleting && currentCharacter <= 0) {
      deleting = false;
      currentPhrase = (currentPhrase + 1) % phrases.length;
    }

    setTimeout(type, deleting ? 100 : wait);
  }

  setTimeout(type, 500);
});


/* Buttons */

// Blade passes URL into this function: redirectToContact("http://127.0.0.1:8000/contact")
function redirectToContact(url) {
  window.location.href = url;
}


/* Particles.js (optional, safe) */

document.addEventListener('DOMContentLoaded', function () {
  if (typeof particlesJS !== "undefined") {
    // Make sure you actually have /public/particles.json if you use this.
    particlesJS.load('particles-js', '/particles.json', function () {
      console.log('particles.js loaded');
    });
  }
});


