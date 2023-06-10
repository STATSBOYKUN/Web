<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$data = [
  $name => $_POST['name'],
  $email => $_POST['email'],
  $date => $_POST['date'],
  $tickets => $_POST['tickets'],
  $invoices => $_POST['invoices'],
  $status => $_POST['status']
];

$tableName = "ticket";
$connection->insertUsers($tableName, $data);
$connection->close();
?>