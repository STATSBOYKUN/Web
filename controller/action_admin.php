<?php

session_start();
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$username = $_POST['username'];
$password = $_POST['password'];
$searchData = array('username' => $username, 'email' => $username);
$tableName = "admin";

$user = $connection->searchAdmins($tableName, $searchData);
if ($user === null) {
  echo "<script type='text/javascript'>alert('Invalid username or password!');</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/admin_login.php';</script>";
  exit();
}

if ($user && $password === $user['password']) {
  $_SESSION['admin'] = $_POST['username'];
  echo "<script type='text/javascript'>alert('Login Success!');</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/admin_dashboard.php';</script>";
} else {
  echo "<script type='text/javascript'>alert('Invalid password!');</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/login.php';</script>";
}

$connection->close();
?>