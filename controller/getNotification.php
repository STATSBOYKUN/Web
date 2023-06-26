<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error'));
}
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

if (!isset($_SESSION['username'])) {
  echo "<p>";
  echo "Notification is empty :).";
  echo "</p>";
} else {

  $tableName = "notifications";
  $username = $_SESSION['username'];

  $connection->getNotifications($tableName, $username);
}

$connection->close();
?>