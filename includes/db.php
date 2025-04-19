<?php
// Database credentials
$servername = 'mysql'; // Use the service name from docker-compose.yml
$username = 'root';
$password = 'root';  // Or your MySQL root password
$dbname = 'lost_and_found';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
