<?php
// Database connection settings
$servername = "localhost";  // Replace with your server, e.g., localhost or a remote server
$username = "root";         // Your MySQL username (default is usually "root")
$password = "";             // Your MySQL password (leave empty if not set)
$dbname = "lost_and_found"; // Database name

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
