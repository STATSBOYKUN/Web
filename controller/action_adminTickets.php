<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "ticket";

$connection -> getTickets($tableName);

$connection->close();