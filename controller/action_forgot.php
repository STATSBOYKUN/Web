<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error'));
}

session_start();
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$username = $_POST['username'];
$searchData = array('email' => $username, 'telephone' => $username);
$tableName = "users";

$user = $connection->searchUsers($tableName, $searchData);
if ($user === null) {
  echo "<script type='text/javascript'>alert('Invalid email or telephone!');</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/forgot.php';</script>";
} else {
  echo "<script type='text/javascript' src='../script/forgot.js'></script>";
  echo "<script type='text/javascript'> alert('Reset link : reset.php');</script>";
}

$connection->close();
?>