<?php
// Connection parameters
$servername = "uws7-143.cafe24.com";
$username = "poleji";
$password = "vhvhfdyd>98";
$dbname = "poleji";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Close connection
$conn->close();
?>
