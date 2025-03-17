<?php
$servername = "localhost"; // Change if using a remote server
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (default is empty for XAMPP)
$dbname = "records_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
