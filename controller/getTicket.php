<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "ticket";
$id = $_GET['id'];

$query = "SELECT * FROM $tableName WHERE id = '$id'";

$result = $connection->executeQuery($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $name = $row["name"];
    $email = $row["email"];
    $date = $row["date"];
    $tickets = $row["tickets"];
    $invoices = $row["invoices"];
    $status = $row["status"];
  }
}

$connection->close();
?>