<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error.php'));
}
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

function updateStatus($ticketId, $status)
{
  global $connection;

  $query = "UPDATE your_table_name SET status = '$status' WHERE id = $ticketId";
  $result = $connection->executeQuery($query);

  if ($result) {
    return true;
  } else {
    return false;
  }
}

$ticketId = $_POST['id'];
$status = $_POST['status'];

if (isset($ticketId) && isset($status)) {
  $updateResult = updateStatus($id, $status);

  if ($updateResult) {
    echo 'Status updated successfully.';
  } else {
    echo 'Error updating the status.';
  }
} else {
  echo 'Invalid request.';
}
$connection->close();

?>