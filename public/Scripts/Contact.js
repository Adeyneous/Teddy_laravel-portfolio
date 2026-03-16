// Store form submission timestamp in localStorage to work alongside cookies
function storeSubmissionTime() {
  localStorage.setItem('lastFormSubmission', Date.now());
}

// Check if enough time has passed since last submission
function canSubmitForm() {
  const lastSubmission = localStorage.getItem('lastFormSubmission');
  if (!lastSubmission) return true;
  
  const hourInMs = 3600000; // 1 hour in milliseconds
  const timeSinceLastSubmission = Date.now() - parseInt(lastSubmission);
  return timeSinceLastSubmission >= hourInMs;
}

// Execute reCAPTCHA on page load
grecaptcha.enterprise.ready(function() {
  grecaptcha.enterprise.execute('6LcPy90pAAAAAKW4gSPra-gSM4nYP3trZYLziDvm', {action: 'contact_page_load'})
      .then(function(token) {
          console.log("Initial reCAPTCHA token:", token);
      })
      .catch(function(error) {
          console.error('Initial reCAPTCHA failed:', error);
      });
});

// Form validation
function validateForm(form) {
  const name = form.querySelector('#name').value.trim();
  const email = form.querySelector('#email').value.trim();
  const message = form.querySelector('#message').value.trim();
  const errors = [];

  if (!name) errors.push('Name is required');
  if (!email) errors.push('Email is required');
  if (!message) errors.push('Message is required');
  
  // Email format validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (email && !emailRegex.test(email)) {
      errors.push('Please enter a valid email address');
  }

  return errors;
}

// Display error messages
function showErrors(errors) {
  // Remove any existing error messages
  const existingErrors = document.querySelectorAll('.error-message');
  existingErrors.forEach(error => error.remove());

  // Create and display new error messages
  const form = document.getElementById('contact-form');
  const errorDiv = document.createElement('div');
  errorDiv.className = 'error-message';
  errorDiv.style.color = '#721c24';
  errorDiv.style.backgroundColor = '#f8d7da';
  errorDiv.style.padding = '10px';
  errorDiv.style.marginBottom = '15px';
  errorDiv.style.borderRadius = '4px';
  
  errorDiv.innerHTML = errors.join('<br>');
  form.insertBefore(errorDiv, form.firstChild);
}

// Handle form submission
async function handleFormSubmit(event) {
  event.preventDefault();
  
  const form = event.target;
  
  // Check for submission cooldown
  if (!canSubmitForm()) {
      showErrors(['Please wait at least an hour between submissions']);
      return;
  }

  // Validate form
  const errors = validateForm(form);
  if (errors.length > 0) {
      showErrors(errors);
      return;
  }

  // Show loading state
  const submitButton = form.querySelector('button[type="submit"]');
  const originalButtonText = submitButton.textContent;
  submitButton.disabled = true;
  submitButton.textContent = 'Sending...';

  try {
      // Get reCAPTCHA token
      await grecaptcha.enterprise.ready(async () => {
          try {
              const token = await grecaptcha.enterprise.execute(
                  '6LcPy90pAAAAAKW4gSPra-gSM4nYP3trZYLziDvm', 
                  {action: 'contact_submit'}
              );
              document.getElementById('recaptchaResponse').value = token;

              // Store submission time and submit form
              storeSubmissionTime();
              form.submit();

          } catch (error) {
              console.error('reCAPTCHA execution failed:', error);
              showErrors(['Verification failed. Please try again.']);
              
              // Reset button state
              submitButton.disabled = false;
              submitButton.textContent = originalButtonText;
          }
      });
  } catch (error) {
      console.error('Form submission error:', error);
      showErrors(['An error occurred. Please try again later.']);
      
      // Reset button state
      submitButton.disabled = false;
      submitButton.textContent = originalButtonText;
  }
}

// Remember email functionality
function setupEmailRemembering() {
  const emailInput = document.getElementById('email');
  const rememberCheckbox = document.getElementById('remember_me');
  
  // Check if there's a remembered email
  const rememberedEmail = localStorage.getItem('rememberedEmail');
  if (rememberedEmail) {
      emailInput.value = rememberedEmail;
      rememberCheckbox.checked = true;
  }

  // Update remembered email when checkbox changes
  rememberCheckbox.addEventListener('change', function() {
      if (this.checked) {
          localStorage.setItem('rememberedEmail', emailInput.value);
      } else {
          localStorage.removeItem('rememberedEmail');
      }
  });
}

// Attach event listeners when DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('contact-form');
  form.addEventListener('submit', handleFormSubmit);
  setupEmailRemembering();

  // Clear error messages when user starts typing
  form.querySelectorAll('input, textarea').forEach(input => {
      input.addEventListener('input', function() {
          const errorMessage = document.querySelector('.error-message');
          if (errorMessage) errorMessage.remove();
      });
  });
});



