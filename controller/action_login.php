<?php
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

// Compare passwords with using password_verify()
if ($user && password_verify($password, $user['password']) ) {
    $_SESSION['username'] = $_POST['username'];
    echo "<script type='text/javascript'>alert('Login Success!');</script>";
    echo "<script type='text/javascript'>window.location.href = '../pages/index.php';</script>";
} else {
    echo "<script type='text/javascript'>alert('Invalid password!');</script>";
    echo "<script type='text/javascript'>window.location.href = '../pages/login.php';</script>";
}

$connection->close();
?>
