<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "users";

$connection -> getUsers($tableName);

$connection->close();
?>