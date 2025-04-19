<?php
$servername = "db"; // Docker service name, NOT 'localhost'
$username = "root";
$password = "root";
$dbname = "lost_and_found";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
