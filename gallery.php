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
    <title>ExtremeSports Gear | Gallery</title>
    <meta name="description" content="Explore our collection of premium sports gear through our visual gallery">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/gallery.css">
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
                    <li><a href="gallery.php" class="active">Gallery</a></li>
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
                <h1>Gallery</h1>
                <p>Explore our sports gear collection through stunning visuals</p>
            </div>
        </section>

        <section class="gallery-section">
            <div class="container">
                <div class="gallery-filters">
                    <h2>Browse by Category</h2>
                    <div class="filter-buttons">
                        <button class="filter-btn active" data-filter="all">All</button>
                        <button class="filter-btn" data-filter="cycling">Cycling</button>
                        <button class="filter-btn" data-filter="winter">Winter</button>
                        <button class="filter-btn" data-filter="water">Water</button>
                        <button class="filter-btn" data-filter="hiking">Hiking</button>
                    </div>
                </div>

                <div class="gallery-grid">
                    <!-- Cycling Category -->
                    <div class="gallery-item" data-category="cycling">
                        <div class="gallery-image" style="background-color: #3498db;">
                            <i class="fas fa-bicycle fa-3x"></i>
                            <div class="gallery-overlay">
                                <h3>Pro Mountain Bike</h3>
                                <p>High-performance carbon frame mountain bike</p>
                                <a href="#" class="btn-secondary">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="cycling">
                        <div class="gallery-image" style="background-color: #2980b9;">
                            <i class="fas fa-helmet-safety fa-3x"></i>
                            <div class="gallery-overlay">
                                <h3>Cycling Helmet</h3>
                                <p>Lightweight protective helmet with MIPS technology</p>
                                <a href="#" class="btn-secondary">View Details</a>
                            </div>
                        </div>
                    </div>

                    <!-- Winter Category -->
                    <div class="gallery-item" data-category="winter">
                        <div class="gallery-image" style="background-color: #2ecc71;">
                            <i class="fas fa-person-skiing fa-3x"></i>
                            <div class="gallery-overlay">
                                <h3>Performance Skis</h3>
                                <p>All-mountain skis for versatile performance</p>
                                <a href="#" class="btn-secondary">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="winter">
                        <div class="gallery-image" style="background-color: #27ae60;">
                            <i class="fas fa-person-snowboarding fa-3x"></i>
                            <div class="gallery-overlay">
                                <h3>Snowboard</h3>
                                <p>All-terrain snowboard for any condition</p>
                                <a href="#" class="btn-secondary">View Details</a>
                            </div>
                        </div>
                    </div>

                    <!-- Water Category -->
                    <div class="gallery-item" data-category="water">
                        <div class="gallery-image" style="background-color: #e74c3c;">
                            <i class="fas fa-water fa-3x"></i>
                            <div class="gallery-overlay">
                                <h3>Surfboard</h3>
                                <p>Performance shortboard for all wave conditions</p>
                                <a href="#" class="btn-secondary">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="water">
                        <div class="gallery-image" style="background-color: #c0392b;">
                            <i class="fas fa-ship fa-3x"></i>
                            <div class="gallery-overlay">
                                <h3>Kayak</h3>
                                <p>Recreational kayak for lakes and slow rivers</p>
                                <a href="#" class="btn-secondary">View Details</a>
                            </div>
                        </div>
                    </div>

                    <!-- Hiking Category -->
                    <div class="gallery-item" data-category="hiking">
                        <div class="gallery-image" style="background-color: #f39c12;">
                            <i class="fas fa-campground fa-3x"></i>
                            <div class="gallery-overlay">
                                <h3>Camping Tent</h3>
                                <p>Lightweight 3-season tent for backpacking</p>
                                <a href="#" class="btn-secondary">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="gallery-item" data-category="hiking">
                        <div class="gallery-image" style="background-color: #d35400;">
                            <i class="fas fa-hiking fa-3x"></i>
                            <div class="gallery-overlay">
                                <h3>Hiking Boots</h3>
                                <p>Waterproof hiking boots with ankle support</p>
                                <a href="#" class="btn-secondary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="gallery-modal">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <div class="modal-image-container">
                    <div class="modal-image" style="background-color: #3498db;">
                        <i class="fas fa-bicycle fa-5x"></i>
                    </div>
                </div>
                <div class="modal-details">
                    <h2 class="modal-title">Product Title</h2>
                    <p class="modal-description">Product description will appear here.</p>
                    <div class="modal-category">
                        <span class="category-icon"></span>
                        <span class="category-name">Category</span>
                    </div>
                    <a href="#" class="btn-primary modal-link">View Product</a>
                </div>
            </div>
        </div>
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
    <script src="scripts/gallery.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initGalleryFilters();
            initGalleryModal();
        });
    </script>
</body>
</html>