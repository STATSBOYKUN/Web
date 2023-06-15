<?php
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