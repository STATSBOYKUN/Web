<?php
session_start();
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();
echo "Success: All notifications marked as read.";
echo "<script>location.href='../pages/index.php';</script>";

$markAllAsRead = $_POST['markAllAsRead'];


if ( $markAllAsRead == "true") {
  $tableName = 'notifications'; // Replace with your actual table name
  $username = $_SESSION['username']; // Replace with the current user's username
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