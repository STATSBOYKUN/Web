<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error'));
}

session_start();
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

if ($status == "Pending") {
  $text = "Your ticket status is $status! Please wait for the admin to review your ticket.";
}

if ($status == "Approved") {
  $text = "Your ticket status is $status! Please wait for the admin to contact you.";
}

if ($status == "Rejected") {
  $text = "Your ticket status is $status! Please contact the admin for more information.";
}

$dateTime = new DateTime();
$dateTime->setTimezone(new DateTimeZone('Asia/Jakarta'));
$currentDate = $dateTime->format('c');

$tableName = "users";

$email = $_POST['email'];
$searchData = array('email' => $email);
$result = $connection->searchUsers($tableName, $searchData);
$username = $result['username'];

$data2 = [
  'username' => $username,
  'text' => $text,
  'time' => $currentDate
];

$tableName = "notifications";
$connection->createNotification($tableName, $data2);

header("Location: ../pages/admin_ticket");

$connection->close();
?>