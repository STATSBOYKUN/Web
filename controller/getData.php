<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error'));
}
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