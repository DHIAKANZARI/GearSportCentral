// ================ Form Validation JavaScript ================
// Handles contact form validation and submission

document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contact-form');
    
    if (contactForm) {
        initFormValidation(contactForm);
    }
});

/**
 * Initialize form validation for the contact form
 * @param {HTMLFormElement} form - The contact form element
 */
function initFormValidation(form) {
    const nameInput = form.querySelector('#name');
    const emailInput = form.querySelector('#email');
    const phoneInput = form.querySelector('#phone');
    const subjectInput = form.querySelector('#subject');
    const messageInput = form.querySelector('#message');
    
    const nameError = document.getElementById('name-error');
    const emailError = document.getElementById('email-error');
    const phoneError = document.getElementById('phone-error');
    const subjectError = document.getElementById('subject-error');
    const messageError = document.getElementById('message-error');
    
    const formSuccess = document.getElementById('form-success');
    
    // Form submission event
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Reset previous error messages
        resetErrors();
        
        // Validate all fields
        const isValid = validateForm();
        
        if (isValid) {
            // Simulate form submission
            submitForm();
        }
    });
    
    // Reset form event
    form.addEventListener('reset', () => {
        resetErrors();
        
        // Hide success message if visible
        if (formSuccess.style.display === 'block') {
            formSuccess.style.display = 'none';
            form.style.display = 'grid';
        }
    });
    
    // Real-time validation for name
    nameInput.addEventListener('blur', () => {
        validateName();
    });
    
    // Real-time validation for email
    emailInput.addEventListener('blur', () => {
        validateEmail();
    });
    
    // Real-time validation for phone
    phoneInput.addEventListener('blur', () => {
        validatePhone();
    });
    
    // Real-time validation for subject
    subjectInput.addEventListener('change', () => {
        validateSubject();
    });
    
    // Real-time validation for message (on focus out)
    messageInput.addEventListener('blur', () => {
        validateMessage();
    });
    
    /**
     * Validate the entire form
     * @returns {boolean} Whether the form is valid
     */
    function validateForm() {
        const isNameValid = validateName();
        const isEmailValid = validateEmail();
        const isPhoneValid = validatePhone();
        const isSubjectValid = validateSubject();
        const isMessageValid = validateMessage();
        
        return isNameValid && isEmailValid && isPhoneValid && isSubjectValid && isMessageValid;
    }
    
    /**
     * Validate the name field
     * @returns {boolean} Whether the name is valid
     */
    function validateName() {
        const value = nameInput.value.trim();
        
        if (value === '') {
            setError(nameInput, nameError, 'Please enter your name');
            return false;
        } else if (value.length < 2) {
            setError(nameInput, nameError, 'Name must be at least 2 characters');
            return false;
        } else if (!/^[a-zA-Z\s-']+$/.test(value)) {
            setError(nameInput, nameError, 'Name contains invalid characters');
            return false;
        } else {
            clearError(nameInput, nameError);
            return true;
        }
    }
    
    /**
     * Validate the email field
     * @returns {boolean} Whether the email is valid
     */
    function validateEmail() {
        const value = emailInput.value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (value === '') {
            setError(emailInput, emailError, 'Please enter your email address');
            return false;
        } else if (!emailPattern.test(value)) {
            setError(emailInput, emailError, 'Please enter a valid email address');
            return false;
        } else {
            clearError(emailInput, emailError);
            return true;
        }
    }
    
    /**
     * Validate the phone field (optional)
     * @returns {boolean} Whether the phone is valid or empty
     */
    function validatePhone() {
        const value = phoneInput.value.trim();
        
        if (value === '') {
            // Phone is optional
            clearError(phoneInput, phoneError);
            return true;
        }
        
        // Basic phone validation - should contain only digits, spaces, and some special characters
        const phonePattern = /^[\d\s()+.-]{7,20}$/;
        
        if (!phonePattern.test(value)) {
            setError(phoneInput, phoneError, 'Please enter a valid phone number');
            return false;
        } else {
            clearError(phoneInput, phoneError);
            return true;
        }
    }
    
    /**
     * Validate the subject field
     * @returns {boolean} Whether the subject is selected
     */
    function validateSubject() {
        const value = subjectInput.value.trim();
        
        if (value === '') {
            setError(subjectInput, subjectError, 'Please select a subject');
            return false;
        } else {
            clearError(subjectInput, subjectError);
            return true;
        }
    }
    
    /**
     * Validate the message field
     * @returns {boolean} Whether the message is valid
     */
    function validateMessage() {
        const value = messageInput.value.trim();
        
        if (value === '') {
            setError(messageInput, messageError, 'Please enter your message');
            return false;
        } else if (value.length < 10) {
            setError(messageInput, messageError, 'Message must be at least 10 characters');
            return false;
        } else {
            clearError(messageInput, messageError);
            return true;
        }
    }
    
    /**
     * Set error message for a field
     * @param {HTMLElement} input - The input element
     * @param {HTMLElement} errorElement - The error message element
     * @param {string} message - The error message
     */
    function setError(input, errorElement, message) {
        input.parentElement.classList.add('error');
        errorElement.textContent = message;
    }
    
    /**
     * Clear error message for a field
     * @param {HTMLElement} input - The input element
     * @param {HTMLElement} errorElement - The error message element
     */
    function clearError(input, errorElement) {
        input.parentElement.classList.remove('error');
        errorElement.textContent = '';
    }
    
    /**
     * Reset all error messages
     */
    function resetErrors() {
        const errorElements = form.querySelectorAll('.error-message');
        const formGroups = form.querySelectorAll('.form-group');
        
        errorElements.forEach(element => {
            element.textContent = '';
        });
        
        formGroups.forEach(group => {
            group.classList.remove('error');
        });
    }
    
    /**
     * Submit the form with animation
     */
    function submitForm() {
        // Add loading state to submit button
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        submitButton.disabled = true;
        
        // Simulate form submission (AJAX would go here in a real application)
        setTimeout(() => {
            // Hide form and show success message
            form.style.display = 'none';
            formSuccess.style.display = 'block';
            
            // Scroll to success message
            formSuccess.scrollIntoView({ behavior: 'smooth' });
            
            // Reset form for future use (but keep it hidden)
            form.reset();
            submitButton.innerHTML = originalText;
            submitButton.disabled = false;
            
            // Log success (would be a real AJAX call in production)
            console.log('Form submitted successfully!');
        }, 1500);
    }
}

/**
 * Add animation to the form when it comes into view
 */
document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.querySelector('.contact-form-container');
    
    if (contactForm) {
        // Check if the form is in the viewport
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }
        
        // Add animation class when form comes into view
        function handleScroll() {
            if (isElementInViewport(contactForm) && !contactForm.classList.contains('animated')) {
                contactForm.style.animation = 'fadeInUp 0.8s ease forwards';
                contactForm.classList.add('animated');
                // Remove the scroll listener once animation is applied
                window.removeEventListener('scroll', handleScroll);
            }
        }
        
        // Add scroll event listener
        window.addEventListener('scroll', handleScroll);
        
        // Check on initial load
        handleScroll();
    }
});
