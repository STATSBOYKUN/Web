<?php
// Your database connection code
require_once("database_connection.php");

$connection = new DatabaseConnection();
$connection->connect();

// Get the username and password from the AJAX request
$username = $_POST['username'];
$password = $_POST['password'];

// Validate the credentials against the database
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo 'invalid'; // Credentials are valid
} else {
    echo 'valid'; // Credentials are invalid
}

$connection->close();
?>
