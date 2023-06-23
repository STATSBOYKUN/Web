<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error.php'));
}
session_start();
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$email = $_POST['email'];
$username = $_POST['username'];
$sex = $_POST['sex'];
$telephone = $_POST['telephone'];
$age = $_POST['age'];
$country = $_POST['country'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$data = [
  'email' => $email,
  'username' => $username,
  'sex' => $sex,
  'telephone' => $telephone,
  'age' => $age,
  'country' => $country,
  'password' => $hashedPassword
];

$isValid = true;

for ($i = 0; $i < strlen($email); $i++) {
    $char = $email[$i];

    if (ctype_upper($char)) {
        $isValid = false;
        break; 
    }

}

if (!$isValid) {
  echo "<script type='text/javascript'>alert('Email is not valid!');</script>";
  echo "<script type='text/javascript'>localStorage.setItem('user_data', JSON.stringify(" . json_encode($data) . "));</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/register.php';</script>";
  exit();
}

if ($password !== $confirmPassword) {
  echo "<script type='text/javascript'>alert('Passwords do not match!');</script>";
  echo "<script type='text/javascript'>localStorage.setItem('user_data', JSON.stringify(" . json_encode($data) . "));</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/register.php';</script>";
  exit();
}

$tableName = "users";

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = null;

$result = $connection->executeQuery($sql);

if ($result !== null && $result->num_rows > 0) {
  echo "<script type='text/javascript'>alert('Username already exists!');</script>";
  echo "<script type='text/javascript'>localStorage.setItem('user_data', JSON.stringify(" . json_encode($data) . "));</script>";
  echo "<script type='text/javascript'>window.location.href = '../pages/register.php';</script>";
} else {
  $tableName = "users";

  try {
    $connection->insertUsers($tableName, $data);
    $connection->close();

    echo "<script type='text/javascript'>localStorage.removeItem('user_data');</script>";

    echo "<script type='text/javascript'>alert('Register Success!');</script>";
    echo "<script type='text/javascript'>window.location.href = '../pages/login.php';</script>";
  } catch (Exception $e) {

  }
}
?>