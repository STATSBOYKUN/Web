<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "notifications";
$username = $_GET['username'];

$connection->getNotifications($tableName, $username);

$connection->close();
?>