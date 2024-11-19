<?php
// Database connection
$host = 'localhost';
$user = 'cheky'; // Adjust as needed
$password = 'cheky';
$database = 'crud';

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
