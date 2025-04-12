<?php
$servername = "localhost";
$username = "root";
$password = ""; // Use your password here if set
$database = "agency";
$port = 3307; // Custom port

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
