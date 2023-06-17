<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$tableName = "logs";

$counterPage = $connection->getCountPage($tableName);

$data = [
  'events' => $counterPage['events'],
  'home' => $counterPage['home'],
  'community' => $counterPage['community'] + 1,
  'about' => $counterPage['about']
];

$connection->countPage($tableName, $data);

$connection->close();
?>