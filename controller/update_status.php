<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

function updateStatus($ticketId, $status) {
  global $connection; // Assuming $connection is your database connection object

  // Update the status in the database
  $query = "UPDATE your_table_name SET status = '$status' WHERE id = $ticketId";
  $result = $connection->executeQuery($query);

  if ($result) {
    // Status updated successfully
    return true;
  } else {
    // Error occurred while updating the status
    return false;
  }
}

// Example usage:
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