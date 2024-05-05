<?php
// Database connection parameters
$servername = "localhost";
$username = "Database_username";
$password = "Database_password";
$database = "Database_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
