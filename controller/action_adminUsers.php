<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error'));
}

require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "users";
$search = $_POST['search'];

if ($search === '' || $search === null) {
  $connection->getUsers($tableName);
} else {
  $searchData = [
    'username' => $search, 
    'email' => $search, 
    'sex' => $search, 
    'telephone' => $search, 
    'age' => $search, 
    'country' => $search
  ];

  $connection->hintUsers($tableName, $searchData);
}

$connection->close();
?>