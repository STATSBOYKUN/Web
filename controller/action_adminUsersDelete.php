<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "users";
$id = $_GET['id'];

$connection -> deleteUsers($tableName, $id);

header("Location: ../pages/admin_users.php");

$connection->close();
?>