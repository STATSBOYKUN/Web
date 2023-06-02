<?php
require_once("database_connection.php");

$connection = new DatabaseConnection();
$connection->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tableName = "users";
  $data = [
    'id' => $_POST['id'],
    'email' => $_POST['email'],
    'username' => $_POST['username'],
    'sex' => $_POST['sex'],
    'telephone' => $_POST['telephone'],
    'age' => $_POST['age'],
    'country' => $_POST['country'],
    'password' => $_POST['password'],
  ];

  $connection->insertUsers($tableName, $data);
}

$connection->close();
header("Location: ../pages/index.php"); // Redirect to index.php
exit();
?>