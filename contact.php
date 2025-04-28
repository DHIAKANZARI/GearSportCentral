<?php
require_once 'includes/auth_functions.php';
$isUserLoggedIn = isLoggedIn();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExtremeSports Gear | Contact Us</title>
    <meta name="description" content="Get in touch with our team for questions about our sports gear or personalized recommendations">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="index.php">
                    <svg class="logo-svg" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25 2C12.318 2 2 12.318 2 25C2 37.682 12.318 48 25 48C37.682 48 48 37.682 48 25C48 12.318 37.682 2 25 2ZM36.83 35.33C36.83 35.33 33.825 37.89 25 37.89C16.175 37.89 13.17 35.33 13.17 35.33C13.17 35.33 20.035 33.235 25 33.235C29.965 33.235 36.83 35.33 36.83 35.33ZM15.765 18.235C17.702 18.235 19.235 19.768 19.235 21.705C19.235 23.642 17.702 25.175 15.765 25.175C13.828 25.175 12.295 23.642 12.295 21.705C12.295 19.768 13.828 18.235 15.765 18.235ZM34.235 18.235C36.172 18.235 37.705 19.768 37.705 21.705C37.705 23.642 36.172 25.175 34.235 25.175C32.298 25.175 30.765 23.642 30.765 21.705C30.765 19.768 32.298 18.235 34.235 18.235Z" fill="#FF5722"/>
                    </svg>
                    <span>ExtremeSports</span>
                </a>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="contact.php" class="active">Contact Us</a></li>
                    <?php if ($isUserLoggedIn): ?>
                    <li><a href="profile.php">My Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </header>

    <main>
        <section class="page-header">
            <div class="container">
                <h1>Contact Us</h1>
                <p>Get in touch with our team for any inquiries</p>
            </div>
        </section>

        <section class="contact-section">
            <div class="container">
                <div class="contact-grid">
                    <div class="contact-info">
                        <h2>How to Reach Us</h2>
                        <p>We're here to help! Reach out with any questions about our products, services, or to get personalized gear recommendations.</p>
                        
                        <div class="contact-methods">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-details">
                                    <h3>Our Location</h3>
                                    <p>123 Adventure Way<br>Sportsville, SP 12345</p>
                                </div>
                            </div>
                            
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-details">
                                    <h3>Phone</h3>
                                    <p>(555) 123-4567<br>Mon-Fri: 9AM - 5PM</p>
                                </div>
                            </div>
                            
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-details">
                                    <h3>Email</h3>
                                    <p>info@extremesports.com<br>support@extremesports.com</p>
                                </div>
                            </div>
                            
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div class="contact-details">
                                    <h3>Social Media</h3>
                                    <div class="social-icons">
                                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="store-hours">
                            <h3>Store Hours</h3>
                            <ul>
                                <li><span>Monday - Friday:</span> 9:00 AM - 8:00 PM</li>
                                <li><span>Saturday:</span> 10:00 AM - 6:00 PM</li>
                                <li><span>Sunday:</span> 11:00 AM - 5:00 PM</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="contact-form-container">
                        <h2>Send Us a Message</h2>
                        <p>Fill out the form below and we'll get back to you as soon as possible.</p>
                        
                        <form id="contactForm" class="contact-form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" <?php if ($isUserLoggedIn): ?>value="<?php echo htmlspecialchars($username); ?>"<?php endif; ?> required>
                                <div class="error-message" id="nameError"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                                <div class="error-message" id="emailError"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone Number (optional)</label>
                                <input type="tel" id="phone" name="phone">
                                <div class="error-message" id="phoneError"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select id="subject" name="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="product">Product Inquiry</option>
                                    <option value="order">Order Status</option>
                                    <option value="returns">Returns & Exchanges</option>
                                    <option value="support">Technical Support</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="error-message" id="subjectError"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" rows="5" required></textarea>
                                <div class="error-message" id="messageError"></div>
                            </div>
                            
                            <div class="form-group form-checkbox">
                                <input type="checkbox" id="consent" name="consent" required>
                                <label for="consent">I agree to the privacy policy and consent to being contacted regarding my inquiry.</label>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="btn-primary">Send Message</button>
                            </div>
                            
                            <div class="form-success" style="display: none;">
                                <i class="fas fa-check-circle"></i>
                                <p>Your message has been sent successfully! We'll get back to you soon.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="faq-section">
            <div class="container">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <div class="faq-container">
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Do you offer international shipping?</h3>
                            <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, we ship to most countries worldwide. International shipping rates and delivery times vary depending on the destination. You can view shipping options during checkout.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>What is your return policy?</h3>
                            <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer">
                            <p>We accept returns within 30 days of purchase for unused items in original packaging. Return shipping is free for defective items. Please contact our customer service team to initiate a return.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Do you offer equipment rentals?</h3>
                            <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, we offer seasonal rentals for select equipment including skis, snowboards, and mountain bikes. Please visit our physical store or call us to inquire about rental availability and rates.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>How can I track my order?</h3>
                            <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer">
                            <p>Once your order ships, you'll receive a tracking number via email. You can also track your order by logging into your account and viewing your order history.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Do you offer equipment servicing and repairs?</h3>
                            <span class="faq-toggle"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, our physical store offers equipment servicing and repairs for bikes, skis, snowboards, and more. Our certified technicians can handle tune-ups, component replacements, and major repairs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <div class="footer-logo">
                        <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25 2C12.318 2 2 12.318 2 25C2 37.682 12.318 48 25 48C37.682 48 48 37.682 48 25C48 12.318 37.682 2 25 2ZM36.83 35.33C36.83 35.33 33.825 37.89 25 37.89C16.175 37.89 13.17 35.33 13.17 35.33C13.17 35.33 20.035 33.235 25 33.235C29.965 33.235 36.83 35.33 36.83 35.33ZM15.765 18.235C17.702 18.235 19.235 19.768 19.235 21.705C19.235 23.642 17.702 25.175 15.765 25.175C13.828 25.175 12.295 23.642 12.295 21.705C12.295 19.768 13.828 18.235 15.765 18.235ZM34.235 18.235C36.172 18.235 37.705 19.768 37.705 21.705C37.705 23.642 36.172 25.175 34.235 25.175C32.298 25.175 30.765 23.642 30.765 21.705C30.765 19.768 32.298 18.235 34.235 18.235Z" fill="#ffffff"/>
                        </svg>
                        <span>ExtremeSports</span>
                    </div>
                    <p>Your trusted source for premium sports gear since 2010.</p>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <?php if ($isUserLoggedIn): ?>
                        <li><a href="profile.php">My Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="products.php#cycling">Cycling</a></li>
                        <li><a href="products.php#winter">Winter Sports</a></li>
                        <li><a href="products.php#water">Water Sports</a></li>
                        <li><a href="products.php#hiking">Hiking & Camping</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact</h3>
                    <address>
                        <p><i class="fas fa-map-marker-alt"></i> 123 Adventure Way, Sportsville</p>
                        <p><i class="fas fa-phone"></i> (555) 123-4567</p>
                        <p><i class="fas fa-envelope"></i> info@extremesports.com</p>
                    </address>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 ExtremeSports Gear. All rights reserved.</p>
                <ul class="footer-legal">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Shipping Info</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="scripts/main.js"></script>
    <script src="scripts/form-validation.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initFaqAccordion();
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                initFormValidation(contactForm);
            }
        });
    </script>
</body>
</html>