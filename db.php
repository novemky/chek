<?php
// Database connection
$host = 'localhost';
$user = 'root'; // Adjust as needed
$password = '';
$database = 'crud_app';

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
