<?php
// Start the session
session_start();

// Destroy the session
session_unset();  // Unset all session variables
session_destroy();  // Destroy the session

// Redirect to the login page or home page after logout
header("Location: login.php");  // Or use 'index.php' if you want to redirect to the homepage
exit();  // Make sure no further code is executed
?>
