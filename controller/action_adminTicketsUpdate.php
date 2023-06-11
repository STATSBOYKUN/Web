<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$id = $_GET['id'];
$status = $_POST['status'];

$data = [
  "status" => $status
];

$tableName = "ticket";
$connection->updateTickets($tableName, $data, $id);

header("Location: ../pages/admin_ticket.php");

$connection->close();
?>
