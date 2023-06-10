<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "users";
$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id = '$id'";

$result = $connection->executeQuery($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $username = $row["username"];
    $email = $row["email"];
    $age = $row["age"];
    $country = $row["country"];
    $telephone = $row["telephone"];
  }
}

$connection->close();
?>