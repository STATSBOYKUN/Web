<?php
require_once("database_connection.php");

$connection = new DatabaseConnection();
$connection->connect();

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_FILES['my_image'])) {
  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];

  if ($error === 0) {
    if ($img_size > 125000) {
    } else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png");

      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = 'uploads/' . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
      } else {
        $em = "You can't upload files of this type";
        header("Location: index.php?error=$em");
      }
    }

    $tableName = "ticket";
    $data = [
      'id' => $_POST['id'],
      'name' => $_POST['name'],
      'email' => $_POST['email'],
      'date' => $_POST['date'],
      'tickets' => $_POST['tickets'],
      'invoices' => $new_img_name,
      'status' => '2'
    ];

    $connection->insertTickets($tableName, $data);
  } else {
    $em = "unknown error occurred!";
    header("Location: index.php?error=$em");
  }
}

$connection->close();
?>