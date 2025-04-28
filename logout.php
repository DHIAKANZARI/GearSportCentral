<?php
require_once 'includes/auth_functions.php';

// Log the user out
logoutUser();

// Redirect to home page
redirect('index.html');
?>