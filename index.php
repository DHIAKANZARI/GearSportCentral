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
    <title>ExtremeSports Gear | Home</title>
    <meta name="description" content="Discover premium sports gear for all your extreme adventures">
    <link rel="stylesheet" href="styles/main.css">
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
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
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
        <section class="hero">
            <div class="hero-content">
                <?php if ($isUserLoggedIn): ?>
                <div class="welcome-message" style="margin-bottom: 20px; background-color: rgba(255, 255, 255, 0.2); padding: 10px; border-radius: 8px;">
                    <p>Welcome back, <strong><?php echo htmlspecialchars($username); ?></strong>!</p>
                </div>
                <?php endif; ?>
                <h1>Gear Up for Adventure</h1>
                <p>Discover premium equipment for every outdoor challenge</p>
                <a href="products.html" class="btn-primary">Explore Gear</a>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <h2 class="section-title">Why Choose Us?</h2>
                <div class="feature-grid">
                    <div class="feature-card">
                        <i class="fas fa-medal"></i>
                        <h3>Premium Quality</h3>
                        <p>Our gear is crafted with the finest materials to ensure durability and performance.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-tag"></i>
                        <h3>Competitive Prices</h3>
                        <p>Get professional-grade equipment without breaking the bank.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-users"></i>
                        <h3>Expert Advice</h3>
                        <p>Our team of sports enthusiasts is always ready to help you find the perfect gear.</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-truck"></i>
                        <h3>Fast Shipping</h3>
                        <p>Quick delivery to get you outdoors and enjoying your adventures faster.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="categories">
            <div class="container">
                <h2 class="section-title">Popular Categories</h2>
                <div class="category-grid">
                    <div class="category-card">
                        <div class="category-image" style="background-color: #3498db;">
                            <i class="fas fa-bicycle"></i>
                        </div>
                        <h3>Cycling</h3>
                        <p>From mountain bikes to road racers, find the perfect ride.</p>
                        <a href="products.html#cycling" class="category-link">View Cycling Gear</a>
                    </div>
                    <div class="category-card">
                        <div class="category-image" style="background-color: #2ecc71;">
                            <i class="fas fa-skiing"></i>
                        </div>
                        <h3>Winter Sports</h3>
                        <p>Skis, snowboards and everything for the snow season.</p>
                        <a href="products.html#winter" class="category-link">View Winter Gear</a>
                    </div>
                    <div class="category-card">
                        <div class="category-image" style="background-color: #e74c3c;">
                            <i class="fas fa-water"></i>
                        </div>
                        <h3>Water Sports</h3>
                        <p>Surfboards, kayaks, and gear for water adventures.</p>
                        <a href="products.html#water" class="category-link">View Water Gear</a>
                    </div>
                    <div class="category-card">
                        <div class="category-image" style="background-color: #f39c12;">
                            <i class="fas fa-hiking"></i>
                        </div>
                        <h3>Hiking & Camping</h3>
                        <p>Equipment for the backcountry explorer.</p>
                        <a href="products.html#hiking" class="category-link">View Hiking Gear</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials">
            <div class="container">
                <h2 class="section-title">What Our Customers Say</h2>
                <div class="testimonial-slider">
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p>"The mountain bike I purchased has completely transformed my trail riding experience. The quality is outstanding!"</p>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h4>Alex Johnson</h4>
                                    <span>Mountain Biking Enthusiast</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p>"I've been shopping for climbing gear for years, and this is by far the best quality equipment I've found."</p>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h4>Maria Rodriguez</h4>
                                    <span>Professional Climber</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p>"Customer service went above and beyond to help me find the perfect snowboard for my skill level."</p>
                            <div class="testimonial-author">
                                <div class="author-info">
                                    <h4>Tyler Smith</h4>
                                    <span>Snowboarding Instructor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-controls">
                    <button class="prev-btn" aria-label="Previous testimonial"><i class="fas fa-chevron-left"></i></button>
                    <div class="slider-dots">
                        <span class="dot active" data-index="0"></span>
                        <span class="dot" data-index="1"></span>
                        <span class="dot" data-index="2"></span>
                    </div>
                    <button class="next-btn" aria-label="Next testimonial"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="container">
                <div class="cta-content">
                    <h2>Ready to Gear Up?</h2>
                    <p>Explore our collection of premium sports equipment and start your next adventure fully prepared.</p>
                    <?php if (!$isUserLoggedIn): ?>
                    <div style="margin-bottom: 20px;">
                        <a href="register.php" class="btn-primary" style="margin-right: 10px;">Sign Up Now</a>
                        <a href="login.php" class="btn-secondary">Login</a>
                    </div>
                    <?php endif; ?>
                    <a href="products.html" class="btn-secondary">Browse Products</a>
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
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
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
                        <li><a href="products.html#cycling">Cycling</a></li>
                        <li><a href="products.html#winter">Winter Sports</a></li>
                        <li><a href="products.html#water">Water Sports</a></li>
                        <li><a href="products.html#hiking">Hiking & Camping</a></li>
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
</body>
</html>