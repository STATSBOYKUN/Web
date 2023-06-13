<?php
require_once("service.php");

$connection = new DatabaseConnection();
$connection->connect();

function validateForm()
{
    $attachedFile = $_FILES['invoices'];

    $maxSizeInBytes = 300000; // 300 KB
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
    $data['username'] = "aaa6";
    $userData = $connection->searchUsers($tableName, $data);

    $name = $_POST['name'];
    $email = $userData['email'];
    $tickets = $_POST['tickets'];
    $status = $_POST['status'];

    // Handle image upload
    $invoiceFile = $_FILES['invoices']['name']; // Get the temporary location of the uploaded file
    $invoiceTmpFile = $_FILES['invoices']['tmp_name']; // Get the temporary location of the uploaded file
    $folder = "../assets/dataImage/"; // Define the folder to which the file will be moved

    move_uploaded_file($invoiceTmpFile, $folder . $invoiceFile); // Move the file to the specified folder

    // Set the default time zone to Jakarta
    date_default_timezone_set('Asia/Jakarta');

    // Create a new DateTime object with the current date and time
    $dateTime = new DateTime();

    // Set the time zone to Jakarta
    $dateTime->setTimezone(new DateTimeZone('Asia/Jakarta'));

    // Format the date as ISO 8601
    $currentDate = $dateTime->format('c');

    $data = [
        'name' => $name,
        'email' => $email,
        'date' => $currentDate,
        'tickets' => $tickets,
        'invoices' => $invoiceFile,
        // Store the file contents in the 'invoices' field
        'status' => $status
    ];

    $tableName = "ticket";
    $connection->insertTickets($tableName, $data);

    $username = $_GET['username'];
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