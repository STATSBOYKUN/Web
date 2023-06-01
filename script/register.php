<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get form data
  $username = $_POST["username-register"];
  $email = $_POST["email-register"];
  $password = $_POST["password-register"];

  // Validate form data
  $errors = [];
  if (empty($username)) {
    $errors[] = "Username is required.";
  }

  if (empty($email)) {
    $errors[] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
  }

  if (empty($password)) {
    $errors[] = "Password is required.";
  }

  // If there are no validation errors, proceed to insert data into the database
  if (empty($errors)) {
    // Establish a database connection (replace the placeholders with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
      echo $sql . $e->getMessage();
    }

    // Prepare and execute the query to insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect to a success page or do any additional processing
    header("Location: login.php");
    exit();
  }
}
?>