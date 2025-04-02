<?php
// db_connect.php

$host = "localhost";
$username = "root"; // Use your MySQL username
$password = ""; // Use your MySQL password
$database = "ecommerce"; // Database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
