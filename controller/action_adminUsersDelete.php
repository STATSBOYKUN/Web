<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error'));
}

session_start();
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "users";
$id = $_GET['id'];

$connection -> deleteUsers($tableName, $id);

header("Location: ../pages/admin_users");

$connection->close();
?>