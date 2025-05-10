<?php
$servername = "localhost";
$username = "your_db_username"; // Change this
$password = "your_db_password"; // Change this
$dbname = "project_eval";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>