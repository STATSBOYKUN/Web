<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error'));
}
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "ticket";
$search = $_POST['search'];

if ($search === '' || $search === null) {
  $connection->getTickets($tableName);
} else {
  $searchData = array('name' => $search, 'email' => $search, 'date' => $search, 'status' => $search);
  $connection->hintTickets($tableName, $searchData);
}

$connection->close();
?>