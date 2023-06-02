<?php
// Your database connection code
require_once("database_connection.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "admin";
$data = [
  'id' => 'guest',
  'username' => $_POST['username'],
  'password' => $_POST['password']
];

if ($connection->searchAdmin($tableName, $data) === 1) {

  echo 'valid'; // Credentials are valid
} else {
  echo 'invalid'; // Credentials are invalid
}

$connection->close();
?>