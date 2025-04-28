<?php
require_once 'config.php';

/**
 * Register a new user
 * 
 * @param string $username Username for the new account
 * @param string $email Email address for the new account
 * @param string $password Password for the new account
 * @return array Result with status and message
 */
function registerUser($username, $email, $password) {
    global $pdo;
    
    // Check if username already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->rowCount() > 0) {
        return [
            'status' => 'error',
            'message' => 'Username already exists'
        ];
    }
    
    // Check if email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        return [
            'status' => 'error',
            'message' => 'Email already exists'
        ];
    }
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert new user
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashed_password]);
        
        return [
            'status' => 'success',
            'message' => 'Registration successful! You can now log in.'
        ];
    } catch (PDOException $e) {
        return [
            'status' => 'error',
            'message' => 'Registration failed: ' . $e->getMessage()
        ];
    }
}

/**
 * Login a user
 * 
 * @param string $username Username or email address
 * @param string $password Password for the account
 * @return array Result with status and message
 */
function loginUser($username, $password) {
    global $pdo;
    
    // Check if username is an email address
    $is_email = filter_var($username, FILTER_VALIDATE_EMAIL);
    
    // Prepare the query based on input type
    if ($is_email) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    }
    
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if user exists
    if (!$user) {
        return [
            'status' => 'error',
            'message' => 'Invalid username/email or password'
        ];
    }
    
    // Verify password
    if (password_verify($password, $user['password'])) {
        // Password is correct, start a new session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        return [
            'status' => 'success',
            'message' => 'Login successful!'
        ];
    } else {
        return [
            'status' => 'error',
            'message' => 'Invalid username/email or password'
        ];
    }
}

/**
 * Logout the current user
 */
function logoutUser() {
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();
}
?>