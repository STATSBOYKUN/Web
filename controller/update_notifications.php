<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error.php'));
}
session_start();
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();
echo "Success: All notifications marked as read.";
echo "<script>location.href='../pages/index.php';</script>";

$markAllAsRead = $_POST['markAllAsRead'];


if ($markAllAsRead == "true") {
  $tableName = 'notifications';
  $username = $_SESSION['username'];
  $updateQuery = "UPDATE $tableName SET `read`='0' WHERE username = '$username'";
  $result = $connection->executeQuery($updateQuery);

  if ($result) {
    echo "Success: All notifications marked as read.";
  } else {
    echo "Error: Failed to update read status.";
  }
} else {
  echo "Error: Invalid request.";
}

$connection->close();
?>