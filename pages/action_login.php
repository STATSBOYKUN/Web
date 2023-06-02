<?php
// Your database connection code
require_once("database_connection.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "users";
$data = [
    'name' => $_POST['username'],
    'email' => $_POST['password']
];

if ($connection->searchAdmin($tableName, $data) === 1) {
    echo 'valid'; // Credentials are valid
} else {
    echo 'invalid'; // Credentials are invalid
}

$connection->close();
?>