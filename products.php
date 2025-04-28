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
    <title>ExtremeSports Gear | Products</title>
    <meta name="description" content="Browse our extensive collection of premium sports gear and equipment">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/products.css">
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
                    <li><a href="products.php" class="active">Products</a></li>
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
                <h1>Our Products</h1>
                <p>Discover premium sports gear for every adventure</p>
            </div>
        </section>

        <section class="product-categories">
            <div class="container">
                <div class="category-nav">
                    <h2>Categories</h2>
                    <ul class="category-tabs">
                        <li><a href="#cycling" class="active">Cycling</a></li>
                        <li><a href="#winter">Winter Sports</a></li>
                        <li><a href="#water">Water Sports</a></li>
                        <li><a href="#hiking">Hiking & Camping</a></li>
                    </ul>
                </div>

                <!-- Cycling Category -->
                <div id="cycling" class="category-section active">
                    <h2 class="category-title">Cycling Gear</h2>
                    <p class="category-description">Whether you're a mountain biker, road cyclist, or casual rider, we have the gear to enhance your cycling experience.</p>
                    
                    <div class="product-grid">
                        <div class="product-card">
                            <div class="product-image" style="background-color: #3498db;">
                                <i class="fas fa-bicycle fa-3x"></i>
                            </div>
                            <div class="product-details">
                                <h3>Pro Mountain Bike</h3>
                                <p class="product-description">High-performance mountain bike with carbon frame, 29" wheels, and premium suspension.</p>
                                <ul class="product-features">
                                    <li>Carbon fiber frame</li>
                                    <li>Hydraulic disc brakes</li>
                                    <li>29" tubeless wheels</li>
                                    <li>12-speed drivetrain</li>
                                </ul>
                                <div class="product-price">$2,499.99</div>
                                <button class="btn-primary">View Details</button>
                            </div>
                        </div>
                        
                        <div class="product-card">
                            <div class="product-image" style="background-color: #2980b9;">
                                <i class="fas fa-helmet-safety fa-3x"></i>
                            </div>
                            <div class="product-details">
                                <h3>Pro Cycling Helmet</h3>
                                <p class="product-description">Lightweight, aerodynamic cycling helmet with MIPS safety technology.</p>
                                <ul class="product-features">
                                    <li>MIPS protection system</li>
                                    <li>Adjustable fit system</li>
                                    <li>Lightweight design (280g)</li>
                                    <li>16 ventilation channels</li>
                                </ul>
                                <div class="product-price">$219.99</div>
                                <button class="btn-primary">View Details</button>
                            </div>
                        </div>
                        
                        <div class="product-card">
                            <div class="product-image" style="background-color: #1abc9c;">
                                <i class="fas fa-person-biking fa-3x"></i>
                            </div>
                            <div class="product-details">
                                <h3>Cycling Jersey Set</h3>
                                <p class="product-description">Professional cycling kit with moisture-wicking fabric and ergonomic padding.</p>
                                <ul class="product-features">
                                    <li>4-way stretch fabric</li>
                                    <li>UV protection (UPF 50+)</li>
                                    <li>Ergonomic chamois padding</li>
                                    <li>3 rear storage pockets</li>
                                </ul>
                                <div class="product-price">$149.99</div>
                                <button class="btn-primary">View Details</button>
                            </div>
                        </div>
                        
                        <div class="product-card">
                            <div class="product-image" style="background-color: #16a085;">
                                <i class="fas fa-shoe-prints fa-3x"></i>
                            </div>
                            <div class="product-details">
                                <h3>Cycling Shoes</h3>
                                <p class="product-description">Carbon-soled cycling shoes for optimal power transfer and comfort.</p>
                                <ul class="product-features">
                                    <li>Carbon composite sole</li>
                                    <li>BOA dial fit system</li>
                                    <li>Breathable upper design</li>
                                    <li>Compatible with all clipless pedals</li>
                                </ul>
                                <div class="product-price">$189.99</div>
                                <button class="btn-primary">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Winter Sports Category -->
                <div id="winter" class="category-section">
                    <h2 class="category-title">Winter Sports Gear</h2>
                    <p class="category-description">Conquer the slopes with our premium selection of skis, snowboards, and winter accessories.</p>
                    
                    <div class="product-grid">
                        <div class="product-card">
                            <div class="product-image" style="background-color: #2ecc71;">
                                <i class="fas fa-snowflake fa-3x"></i>
                            </div>
                            <div class="product-details">
                                <h3>All-Mountain Skis</h3>
                                <p class="product-description">Versatile all-mountain skis for varied terrain and snow conditions.</p>
                                <ul class="product-features">
                                    <li>Wood core construction</li>
                                    <li>88mm waist width</li>
                                    <li>Rocker/Camber profile</li>
                                    <li>Sintered high-density base</li>
                                </ul>
                                <div class="product-price">$599.99</div>
                                <button class="btn-primary">View Details</button>
                            </div>
                        </div>
                        
                        <div class="product-card">
                            <div class="product-image" style="background-color: #27ae60;">
                                <i class="fas fa-person-skiing fa-3x"></i>
                            </div>
                            <div class="product-details">
                                <h3>Ski Boots</h3>
                                <p class="product-description">Performance ski boots with custom heat-moldable liner for perfect fit.</p>
                                <ul class="product-features">
                                    <li>100mm last width</li>
                                    <li>Flex rating: 110</li>
                                    <li>4 micro-adjustable buckles</li>
                                    <li>Heat-moldable liner</li>
                                </ul>
                                <div class="product-price">$449.99</div>
                                <button class="btn-primary">View Details</button>
                            </div>
                        </div>
                        
                        <div class="product-card">
                            <div class="product-image" style="background-color: #16a085;">
                                <i class="fas fa-person-snowboarding fa-3x"></i>
                            </div>
                            <div class="product-details">
                                <h3>All-Terrain Snowboard</h3>
                                <p class="product-description">Versatile snowboard that excels in all conditions, from groomers to powder.</p>
                                <ul class="product-features">
                                    <li>Directional twin shape</li>
                                    <li>Medium flex pattern</li>
                                    <li>Hybrid camber profile</li>
                                    <li>Sintered base for speed</li>
                                </ul>
                                <div class="product-price">$479.99</div>
                                <button class="btn-primary">View Details</button>
                            </div>
                        </div>
                        
                        <div class="product-card">
                            <div class="product-image" style="background-color: #1abc9c;">
                                <i class="fas fa-mitten fa-3x"></i>
                            </div>
                            <div class="product-details">
                                <h3>Insulated Snow Gloves</h3>
                                <p class="product-description">Waterproof and breathable gloves for winter sports with touchscreen compatibility.</p>
                                <ul class="product-features">
                                    <li>3-layer waterproof membrane</li>
                                    <li>Thinsulate insulation</li>
                                    <li>Leather palm reinforcement</li>
                                    <li>Touchscreen compatible</li>
                                </ul>
                                <div class="product-price">$79.99</div>
                                <button class="btn-primary">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Water Sports Category -->
                <div id="water" class="category-section">
                    <h2 class="category-title">Water Sports Gear</h2>
                    <p class="category-description">Dive into adventure with our collection of water sports equipment for surfing, kayaking, and more.</p>
                    
                    <!-- Content for Water Sports (omitted for brevity) -->
                </div>

                <!-- Hiking Category -->
                <div id="hiking" class="category-section">
                    <h2 class="category-title">Hiking & Camping Gear</h2>
                    <p class="category-description">Get equipped for your outdoor adventures with our selection of hiking and camping gear.</p>
                    
                    <!-- Content for Hiking & Camping (omitted for brevity) -->
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
            initProductTabs();
        });
    </script>
</body>
</html>