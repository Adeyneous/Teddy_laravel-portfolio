function animatePercentage(element, percentage) {
    let currentPercentage = 0;
    const textElement = element.querySelector('.circle-text');
    const interval = setInterval(() => {
        if (currentPercentage >= percentage) {
            clearInterval(interval);
        } else {
            currentPercentage++;
            textElement.textContent = currentPercentage + '%';
        }
    }, 10); // Speed of the count-up animation
}

function showPercentage(element) {
    const percentage = parseInt(element.getAttribute('data-skill-percentage'), 10);
    const circle = element.querySelector('.circle-progress');
    const radius = circle.r.baseVal.value;
    const circumference = 2 * Math.PI * radius;
    const offset = circumference * ((100 - percentage) / 100);

    animatePercentage(element, percentage);

    // This line animates the stroke offset to show progress
    circle.style.strokeDashoffset = offset;
    
    const description = element.getAttribute('data-skill-desc');
    const descriptionParagraph = document.getElementById('skill-description');
    descriptionParagraph.innerText = description;
    descriptionParagraph.style.display = 'block';
}

function hidePercentage(element) {
    const circle = element.querySelector('.circle-progress');
    const textElement = element.querySelector('.circle-text');
    textElement.textContent = '';
    const radius = circle.r.baseVal.value;
    const circumference = 2 * Math.PI * radius;

    // Reset circle progress
    circle.style.strokeDashoffset = circumference;
    // Reset text to the skill name or empty if no initial text is desired
    textElement.textContent = ''; // or textElement.textContent = '';

     // Reset description text
     document.getElementById('skill-description').innerText = '';
     document.getElementById('skill-description').style.display = 'none';
    
}


document.querySelectorAll('.skill').forEach(item => {
    item.addEventListener('mouseover', function() {
        showPercentage(this);
        const description = this.getAttribute('data-skill-desc');
        const descriptionParagraph = document.getElementById('skill-description').style.textAlign = "center";
        descriptionParagraph.innerHTML = description;
        descriptionParagraph.style.display = 'block'; // Show the paragraph
    });
    item.addEventListener('mouseout', function() {
        hidePercentage(this);
        const descriptionParagraph = document.getElementById('skill-description');
        descriptionParagraph.style.display = 'none'; // Hide the paragraph

        
    });

    
});



/* Logos */
document.addEventListener("DOMContentLoaded", function() {
    const logoContainer = document.querySelector('.logo-container');
  
    function calculateTotalWidth(logos) {
        return Array.from(logos).reduce((acc, logo) => acc + logo.offsetWidth + parseFloat(getComputedStyle(logo).marginRight), 0);
    }
  
    let totalWidthLogo = calculateTotalWidth(document.querySelectorAll('.logo-container .logo'));
  
    function animateLogos(container, width) {
        let currentPosition = 0;
        const logos = container.querySelectorAll('.logo');
        container.style.visibility = 'visible';
  
        function step() {
            currentPosition -= 2;
            if (currentPosition <= -width) {
                currentPosition += width;
            }
  
            logos.forEach((logo, index) => {
                const logoWidth = logo.offsetWidth + parseFloat(getComputedStyle(logo).marginRight);
                const initialOffset = index * logoWidth;
                let effectivePosition = currentPosition + initialOffset;
  
                logo.style.transform = `translateX(${effectivePosition}px)`;
            });
  
            requestAnimationFrame(step);
        }
  
        step();
    }
  
    animateLogos(logoContainer, totalWidthLogo);
  
    window.addEventListener('resize', function() {
        totalWidthLogo = calculateTotalWidth(document.querySelectorAll('.logo-container .logo'));
        logoContainer.style.width = `${totalWidthLogo}px`;
        animateLogos(logoContainer, totalWidthLogo);
    });
  });
  







