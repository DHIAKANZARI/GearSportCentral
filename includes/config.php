<?php
// Database configuration
$host = getenv('PGHOST');
$port = getenv('PGPORT');
$database = getenv('PGDATABASE');
$username = getenv('PGUSER');
$password = getenv('PGPASSWORD');

// Establish database connection
try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$database;user=$username;password=$password";
    $pdo = new PDO($dsn);
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