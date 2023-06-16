<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "ticket";
$search = $_POST['search'];

if ($search === '' || $search === null) {
  $connection -> getTickets($tableName);
} else {
  $searchData = array('name' => $search, 'email' => $search, 'date' => $search, 'status' => $search);
  $connection -> hintTickets($tableName, $searchData);
}

$connection->close();
?>