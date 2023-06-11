<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$data = [
  'username' => $username,
  'password' => $hashedPassword
];

// Check if the passwords match
if ($password !== $confirmPassword) {
  echo "<script type='text/javascript'>alert('Passwords do not match!');</script>";
  echo "<script type='text/javascript'>localStorage.setItem('user_data', JSON.stringify(" . json_encode($data) . "));</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/register.php';</script>";
  exit();
}

$tableName = "admin";

$sql = "SELECT * FROM $tableName WHERE username = '$username'";
$result = null;

$result = $connection->executeQuery($sql);

if ($result !== null && $result->num_rows > 0) {
  echo "<script type='text/javascript'>alert('Username already exists!');</script>";
  echo "<script type='text/javascript'>localStorage.setItem('user_data', JSON.stringify(" . json_encode($data) . "));</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/register.php';</script>";
} else {
  $tableName = "admin";

  try {
    $connection->updateAdmins($tableName, $data, $id);
    $connection->close();

    echo "<script type='text/javascript'>localStorage.removeItem('user_data');</script>";

    echo "<script type='text/javascript'>alert('Register Success!');</script>";
    echo "<script type='text/javascript'>window.location.href = '../pages/admin_dashboard.php';</script>";
  } catch (Exception $e) {

  }
}
?>
