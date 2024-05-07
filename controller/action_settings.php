<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error'));
}

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

if ($password !== $confirmPassword) {
  echo "<script type='text/javascript'>alert('Passwords do not match!');</script>";
  echo "<script type='text/javascript'>localStorage.setItem('user_data', JSON.stringify(" . json_encode($data) . "));</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/admin_settings';</script>";
  exit();
}

$tableName = "admin";

try {
  $connection->updateAdmins($tableName, $data, $username);
  $connection->close();

  echo "<script type='text/javascript'>localStorage.removeItem('user_data');</script>";

  echo "<script type='text/javascript'>alert('Admins Edited!');</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/admin_dashboard';</script>";
} catch (Exception $e) {

}
?>