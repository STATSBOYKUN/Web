<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: ../pages/error.php'));
  }
  
session_start();
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$username = $_POST['username'];
$password = $_POST['password'];
$searchData = array('username' => $username, 'email' => $username);
$tableName = "users";

$user = $connection->searchUsers($tableName, $searchData);
if ($user === null) {
    echo "<script type='text/javascript'>alert('Invalid username or password!');</script>";
    echo "<script type='text/javascript'>window.location.href = '../pages/login.php';</script>";
    exit();
}

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $user['username'];
    echo "<script type='text/javascript'>alert('Login Success!');</script>";
    echo "<script type='text/javascript'>window.location.href = '../pages/index.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Invalid password!');</script>";
    echo "<script type='text/javascript'>window.location.href = '../pages/login.php';</script>";
}

$connection->close();
?>