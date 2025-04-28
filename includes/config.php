
<?php
// Database configuration for XAMPP
$host = 'localhost';
$database = 'extremesports';
$username = 'root';
$password = '';

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Establish database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    error_log("Database connected successfully");
} catch (PDOException $e) {
    error_log("Database Connection Error: " . $e->getMessage());
    die("Database connection failed. Please check your configuration.");
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to redirect to another page
function redirect($location) {
    header("Location: $location");
    exit;
}
?>
