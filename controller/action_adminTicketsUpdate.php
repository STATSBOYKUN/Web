<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

$id = $_GET['id'];
$status = $_POST['status'];

$data = [
  "status" => $status
];

$tableName = "ticket";
$connection->updateTickets($tableName, $data, $id);

$username = $_GET['username'];

if ($status == "Pending") {
  $text = "Your ticket status is $status! Please wait for the admin to review your ticket.";
}

if ($status == "Approved") {
  $text = "Your ticket status is $status! Please wait for the admin to contact you.";
}

if ($status == "Rejected") {
  $text = "Your ticket status is $status! Please contact the admin for more information.";
}

// Create a new DateTime object with the current date and time
$dateTime = new DateTime();

// Set the time zone to Jakarta
$dateTime->setTimezone(new DateTimeZone('Asia/Jakarta'));

// Format the date as ISO 8601
$currentDate = $dateTime->format('c');

$data2 = [
  'username' => $username,
  'text' => $text,
  'time' => $currentDate
];

$tableName = "notifications";
$connection->createNotification($tableName, $data2);

header("Location: ../pages/admin_ticket.php");

$connection->close();
?>