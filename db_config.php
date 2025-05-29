<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Use your MySQL username
$password = "";     // Use your MySQL password
$dbname = "currency_converter"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Connection successful
    // You can log success or leave it blank
    // echo "Connected successfully";
}
?>
