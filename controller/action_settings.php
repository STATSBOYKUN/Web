<?php
session_start();
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$username = $_SESSION['admin'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$data = [
  'password' => $hashedPassword
];

// Check if the passwords match
if ($password !== $confirmPassword) {
  echo "<script type='text/javascript'>alert('Passwords do not match!');</script>";
  echo "<script type='text/javascript'>localStorage.setItem('user_data', JSON.stringify(" . json_encode($data) . "));</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/admin_settings.php';</script>";
  exit();
}

$tableName = "admin";

try {
  $connection->updateAdmins($tableName, $data, $username);
  $connection->close();

  echo "<script type='text/javascript'>localStorage.removeItem('user_data');</script>";

  echo "<script type='text/javascript'>alert('Admins Edited!');</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/admin_dashboard.php';</script>";
} catch (Exception $e) {

}
?>