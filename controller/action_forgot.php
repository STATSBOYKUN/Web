<?php
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