<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "logs";

$counterPage = $connection->getCountPage($tableName);

$data = [
  'events' => $counterPage['events']+1,
  'home' => $counterPage['home'],
  'community' => $counterPage['community'],
  'about' => $counterPage['about']
];

$connection->countPage($tableName, $data);

$connection->close();
?>