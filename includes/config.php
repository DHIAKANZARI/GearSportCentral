
<?php
// Database configuration
$host = getenv('MYSQL_HOST');
$database = getenv('MYSQL_DATABASE');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');

// Establish database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
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
