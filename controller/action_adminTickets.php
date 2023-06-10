<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "ticket";

$connection -> getUsers($tableName);

$connection->close();