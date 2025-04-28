<?php
require_once 'includes/auth_functions.php';

// Check if user is logged in
if (!isLoggedIn()) {
    redirect('login.php');
}

// Get user information
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Get user details from database
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $user['email'];
$created_at = date('F j, Y', strtotime($user['created_at']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExtremeSports Gear | My Profile</title>
    <meta name="description" content="View and manage your ExtremeSports Gear account">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            padding: var(--spacing-xl);
            background-color: var(--bg-light);
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-md);
        }
        
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: var(--spacing-lg);
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: var(--spacing-lg);
            color: white;
            font-size: 2.5rem;
        }
        
        .profile-details {
            margin-bottom: var(--spacing-xl);
        }
        
        .profile-details h3 {
            margin-bottom: var(--spacing-xs);
            color: var(--primary-color);
            border-bottom: 1px solid var(--border-color);
            padding-bottom: var(--spacing-xs);
        }
        
        .profile-detail {
            margin-bottom: var(--spacing-md);
        }
        
        .profile-label {
            font-weight: bold;
            margin-right: var(--spacing-sm);
        }
        
        .profile-actions {
            margin-top: var(--spacing-xl);
            display: flex;
            gap: var(--spacing-md);
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="index.html">
                    <svg class="logo-svg" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25 2C12.318 2 2 12.318 2 25C2 37.682 12.318 48 25 48C37.682 48 48 37.682 48 25C48 12.318 37.682 2 25 2ZM36.83 35.33C36.83 35.33 33.825 37.89 25 37.89C16.175 37.89 13.17 35.33 13.17 35.33C13.17 35.33 20.035 33.235 25 33.235C29.965 33.235 36.83 35.33 36.83 35.33ZM15.765 18.235C17.702 18.235 19.235 19.768 19.235 21.705C19.235 23.642 17.702 25.175 15.765 25.175C13.828 25.175 12.295 23.642 12.295 21.705C12.295 19.768 13.828 18.235 15.765 18.235ZM34.235 18.235C36.172 18.235 37.705 19.768 37.705 21.705C37.705 23.642 36.172 25.175 34.235 25.175C32.298 25.175 30.765 23.642 30.765 21.705C30.765 19.768 32.298 18.235 34.235 18.235Z" fill="#FF5722"/>
                    </svg>
                    <span>ExtremeSports</span>
                </a>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="profile.php" class="active">My Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
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
                <h1>My Profile</h1>
                <p>View and manage your account details</p>
            </div>
        </section>

        <section class="profile-section">
            <div class="container">
                <div class="profile-container">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
                            <p>Member since <?php echo $created_at; ?></p>
                        </div>
                    </div>
                    
                    <div class="profile-details">
                        <h3>Account Information</h3>
                        <div class="profile-detail">
                            <span class="profile-label">Username:</span>
                            <span><?php echo htmlspecialchars($username); ?></span>
                        </div>
                        <div class="profile-detail">
                            <span class="profile-label">Email:</span>
                            <span><?php echo htmlspecialchars($email); ?></span>
                        </div>
                        <div class="profile-detail">
                            <span class="profile-label">Account ID:</span>
                            <span><?php echo $user_id; ?></span>
                        </div>
                    </div>
                    
                    <div class="profile-actions">
                        <a href="logout.php" class="btn-secondary">Logout</a>
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <?php if (isLoggedIn()): ?>
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