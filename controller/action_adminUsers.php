<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "users";
$search = $_POST['search'];

if ($search === '' || $search === null) {
  $connection -> getUsers($tableName);
} else {
  $searchData = array('username' => $search, 'email' => $search, 'sex' => $search, 'telephone' => $search, 'age' => $search, 'country' => $search);
  $connection -> hintUsers($tableName, $searchData);
}

$connection->close();
?>