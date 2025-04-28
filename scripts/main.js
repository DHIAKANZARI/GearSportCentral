// ================ Main JavaScript ================
// Handles navigation, testimonial slider, and general interactive elements

document.addEventListener('DOMContentLoaded', () => {
    // Initialize Mobile Navigation
    initMobileNav();
    
    // Initialize Testimonial Slider (if on homepage)
    if (document.querySelector('.testimonial-slider')) {
        initTestimonialSlider();
    }
    
    // Initialize Products Tab Navigation (if on products page)
    if (document.querySelector('.category-tabs')) {
        initProductTabs();
    }
    
    // Initialize FAQ Accordion (if on contact page)
    if (document.querySelector('.faq-item')) {
        initFaqAccordion();
    }
});

/**
 * Initialize the mobile navigation hamburger menu
 */
function initMobileNav() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    
    // Toggle mobile menu
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });
    
    // Close mobile menu when clicking a link
    document.querySelectorAll('.nav-menu a').forEach(navLink => {
        navLink.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', (event) => {
        const isClickInsideNav = navMenu.contains(event.target);
        const isClickOnHamburger = hamburger.contains(event.target);
        
        if (!isClickInsideNav && !isClickOnHamburger && navMenu.classList.contains('active')) {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
        }
    });
}

/**
 * Initialize testimonial slider on homepage
 */
function initTestimonialSlider() {
    const testimonials = document.querySelectorAll('.testimonial-item');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentIndex = 0;
    let touchStartX = 0;
    let touchEndX = 0;
    
    // Hide all testimonials except the first one
    testimonials.forEach((testimonial, index) => {
        if (index !== 0) {
            testimonial.style.display = 'none';
        }
    });
    
    // Show a specific testimonial
    function showTestimonial(index) {
        testimonials.forEach((testimonial, i) => {
            testimonial.style.display = i === index ? 'block' : 'none';
            testimonial.style.animation = i === index ? 'fadeIn 0.5s ease' : '';
        });
        
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
        
        currentIndex = index;
    }
    
    // Previous button click
    prevBtn.addEventListener('click', () => {
        const newIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
        showTestimonial(newIndex);
    });
    
    // Next button click
    nextBtn.addEventListener('click', () => {
        const newIndex = (currentIndex + 1) % testimonials.length;
        showTestimonial(newIndex);
    });
    
    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showTestimonial(index);
        });
    });
    
    // Touch swipe for mobile
    const slider = document.querySelector('.testimonial-slider');
    
    slider.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });
    
    slider.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });
    
    function handleSwipe() {
        const swipeThreshold = 50;
        
        if (touchEndX < touchStartX - swipeThreshold) {
            // Swipe left - show next
            const newIndex = (currentIndex + 1) % testimonials.length;
            showTestimonial(newIndex);
        } else if (touchEndX > touchStartX + swipeThreshold) {
            // Swipe right - show previous
            const newIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
            showTestimonial(newIndex);
        }
    }
    
    // Auto-advance testimonials every 5 seconds
    let intervalId = setInterval(() => {
        const newIndex = (currentIndex + 1) % testimonials.length;
        showTestimonial(newIndex);
    }, 5000);
    
    // Pause auto-advance on hover
    slider.addEventListener('mouseenter', () => {
        clearInterval(intervalId);
    });
    
    slider.addEventListener('mouseleave', () => {
        intervalId = setInterval(() => {
            const newIndex = (currentIndex + 1) % testimonials.length;
            showTestimonial(newIndex);
        }, 5000);
    });
}

/**
 * Initialize product category tabs on the products page
 */
function initProductTabs() {
    const categoryTabs = document.querySelectorAll('.category-tabs a');
    const categorySections = document.querySelectorAll('.category-section');
    
    // Handle tab click
    categoryTabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Remove active class from all tabs
            categoryTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            tab.classList.add('active');
            
            // Get the target category
            const targetId = tab.getAttribute('href').substring(1);
            
            // Hide all sections and show the target one
            categorySections.forEach(section => {
                section.classList.remove('active');
                
                if (section.id === targetId) {
                    section.classList.add('active');
                    
                    // Smooth scroll to the section on mobile
                    if (window.innerWidth < 768) {
                        section.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            });
        });
    });
    
    // Check if URL contains a hash for a specific category
    if (window.location.hash) {
        const hash = window.location.hash.substring(1);
        const targetTab = document.querySelector(`.category-tabs a[href="#${hash}"]`);
        
        if (targetTab) {
            targetTab.click();
        }
    }
}

/**
 * Initialize FAQ accordion on the contact page
 */
function initFaqAccordion() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            // Toggle active class on the clicked item
            item.classList.toggle('active');
            
            // Close other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
        });
    });
    
    // Open the first FAQ item by default
    if (faqItems.length > 0) {
        faqItems[0].classList.add('active');
    }
}
