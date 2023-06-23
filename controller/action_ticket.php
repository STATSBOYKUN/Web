<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: ../pages/error.php'));
  }
session_start();
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

function validateForm()
{
    $attachedFile = $_FILES['invoices'];

    $maxSizeInBytes = 300000;
    if ($attachedFile['size'] > $maxSizeInBytes) {
        echo "<script>alert('Attached file size exceeds the limit of 300 KB.');";
        echo "document.querySelector('.file__items input[type=\"file\"]').focus();</script>";
        return false;
    }

    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validateForm()) {
        echo "<script type='text/javascript'>window.location.href = '../pages/ticket.php';</script>";
        exit;
    }

    $tableName = "users";
    $data['username'] = $_SESSION['username'];
    $userData = $connection->searchUsers($tableName, $data);

    $name = $_POST['name'];
    $email = $userData['email'];
    $tickets = $_POST['tickets'];
    $status = $_POST['status'];

    $invoiceFile = $_FILES['invoices']['name'];
    $invoiceTmpFile = $_FILES['invoices']['tmp_name'];
    $folder = "../assets/dataImage/";

    move_uploaded_file($invoiceTmpFile, $folder . $invoiceFile);
    date_default_timezone_set('Asia/Jakarta');

    $dateTime = new DateTime();
    $dateTime->setTimezone(new DateTimeZone('Asia/Jakarta'));
    $currentDate = $dateTime->format('c');

    $data = [
        'name' => $name,
        'email' => $email,
        'date' => $currentDate,
        'tickets' => $tickets,
        'invoices' => $invoiceFile,
        'status' => $status
    ];

    $tableName = "ticket";
    $connection->insertTickets($tableName, $data);

    $username = $_SESSION['username'];
    $text = "Your ticket is under review!";
    $data2 = [
        'username' => $username,
        'text' => $text,
        'time' => $currentDate
    ];

    $tableName = "notifications";
    $connection->createNotification($tableName, $data2);
    echo "<script type='text/javascript'>alert('Ticket Submitted!');</script>";
    echo "<script type='text/javascript'>window.location.href = '../pages/events.php';</script>";

    $connection->close();
}
?>