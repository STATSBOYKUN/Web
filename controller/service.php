<?php
class DatabaseConnection
{
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "mhs_222112404";
  private $connection;

  public function __construct()
  {

  }
  public function connect()
  {
    $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

    if ($this->connection->connect_error) {
      die("Connection failed: " . $this->connection->connect_error);
    }
  }

  public function close()
  {
    $this->connection->close();
  }

  public function executeQuery($query)
  {
    $result = $this->connection->query($query);

    if ($result === false) {
    } else {

    }

    return $result;
  }

  public function insertUsers($tableName, $data)
  {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";

    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

    if ($this->connection->query($query) === true) {
    } else {
    }
  }

  public function insertAdmins($tableName, $data)
  {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";

    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

    if ($this->connection->query($query) === true) {
    } else {
    }
  }

  public function insertTickets($tableName, $data)
  {
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), "?"));

    // Prepare the SQL statement with placeholders
    $query = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";

    // Prepare the statement
    $stmt = $this->connection->prepare($query);

    // Bind the parameters to the statement
    $bindTypes = ""; // Parameter types
    $bindParams = []; // Parameter values

    foreach ($data as $value) {
      if (is_string($value)) {
        $bindTypes .= "s";
      } else {
        $bindTypes .= "b";
      }

      $bindParams[] = $value;
    }

    $stmt->bind_param($bindTypes, ...$bindParams);

    // Execute the statement
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      // Success
    } else {
      // Error
    }

    $stmt->close();
  }



  public function getUsers($tableName)
  {
    $query = "SELECT * FROM $tableName";
    $result = $this->connection->query($query);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['sex'] . "</td>";
        echo "<td>" . $row['telephone'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['country'] . "</td>";
        echo "<td> <a href='../pages/admin_usersUpdate.php?id=", $row["id"], " '><img id='img1' src='../assets/Icons/bx-edit.svg'/></a></td>";
        echo "<td> <a href='../controller/action_adminUsersDelete.php?id=", $row["id"], "'><img id='img2' src='../assets/Icons/bx-trash.svg' alt='' onclick='return confirmDelete(event)'/></a></td>";
        echo "</tr>";
      }
    } else {
      echo "No data found.";
    }
  }

  public function getTickets($tableName)
  {
    $query = "SELECT * FROM $tableName";
    $result = $this->connection->query($query);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['tickets'] . "</td>";
        echo "<td>";

        if (!empty($row['invoices'])) {
          $invoicePath = "../assets/dataImage/" . $row['invoices'];
          echo "<a href='$invoicePath' class='invoice-link'>View Invoice</a>";
        } else {
          echo "No invoice attached";
        }

        echo "</td>";
        echo "<td>";
        echo "<div class='dropdown'>";
        echo "" . $row['status'];
        echo "</div>";
        echo "</td>";
        echo "<td> <a href='../pages/admin_ticketsUpdate.php?id=", $row["id"], " '><img id='img1' src='../assets/Icons/bx-edit.svg'/></a></td>";
        echo "</tr>";
      }
    } else {
      echo "No data found.";
    }
  }

  public function getNotifications($tableName, $username)
  {
    $query = "SELECT * FROM $tableName WHERE username = '$username'";
    $result = $this->connection->query($query);

    $dateTime = new DateTime();
    $dateTime->setTimezone(new DateTimeZone('Asia/Jakarta'));
    $currentDate = $dateTime->format('Y-m-d H:i:s'); // Format the current date and time

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='notification__body'>";
        echo "<div class='notification__image'>";
        echo "<img src='../assets/Events/animisc.svg' alt='logo' />";
        echo "</div>";
        echo "<div class='notification__text'>";
        echo "<div class='notification__text1'>";
        echo "" . $row['text'];
        echo "</div>";
        echo "<div class='notification__text2'>Admin •";

        // Calculate the difference in seconds
        $rowDate = new DateTime($row['time']);
        $interval = $dateTime->diff($rowDate);
        $secondsDifference = $interval->s;
        if ($interval->i < 1) {
          echo " ({$secondsDifference} seconds ago)";
        } elseif ($interval->h < 1) {
          echo " ({$interval->i} minutes ago)";
        } else {
          echo " ({$interval->h} hours ago)";
        }

        echo "</div>";
        echo "</div>";
        echo "</div>";
      }
    } else {
      echo "<p>";
      echo "Notification is empty :).";
      echo "</p>";
    }

  }

  public function updateAdmins($tableName, $data, $id)
  {
    $updates = [];
    foreach ($data as $column => $value) {
      $updates[] = "$column = '$value'";
    }
    $updateString = implode(", ", $updates);

    $query = "UPDATE $tableName SET $updateString WHERE id = $id";

    if ($this->connection->query($query) === true) {
      // Update successful
    } else {
      // Update failed
    }
  }

  public function updateUsers($tableName, $data, $id)
  {

    $updates = [];
    foreach ($data as $column => $value) {
      $updates[] = "$column = '$value'";
    }
    $updateString = implode(", ", $updates);

    $query = "UPDATE $tableName SET $updateString WHERE id = $id";

    if ($this->connection->query($query) === true) {
      // Update successful
    } else {
      // Update failed
    }
  }

  public function updateTickets($tableName, $data, $id)
  {
    $updates = [];
    foreach ($data as $column => $value) {
      $updates[] = "$column = '$value'";
    }
    $updateString = implode(", ", $updates);

    $query = "UPDATE $tableName SET $updateString WHERE id = $id";

    if ($this->connection->query($query) === true) {
      // Update successful
    } else {
      // Update failed
    }
  }

  public function deleteUsers($tableName, $id)
  {
    $query = "DELETE FROM $tableName WHERE id = $id";

    if ($this->connection->query($query) === true) {

    } else {
    }
  }

  public function searchAdmins($tableName, $searchData)
  {
    $conditions = [];
    foreach ($searchData as $field => $value) {
      $conditions[] = "$field = '$value'";
    }
    $conditionString = implode(" OR ", $conditions);

    $query = "SELECT * FROM $tableName WHERE $conditionString";

    $result = $this->connection->query($query);

    if ($result && $result->num_rows > 0) {
      return $result->fetch_assoc();
    }

    return null;
  }


  public function searchUsers($tableName, $searchData)
  {
    $conditions = [];
    foreach ($searchData as $field => $value) {
      $conditions[] = "$field = '$value'";
    }
    $conditionString = implode(" OR ", $conditions);

    $query = "SELECT * FROM $tableName WHERE $conditionString";

    $result = $this->connection->query($query);

    if ($result && $result->num_rows > 0) {
      return $result->fetch_assoc();
    }

    return null;
  }

  public function createNotification($tableName, $data)
  {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";

    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

    if ($this->connection->query($query) === true) {
      // Insert successful
    } else {
      // Insert failed
    }
  }

  public function countPage($tableName, $data)
  {
    $updates = [];
    foreach ($data as $column => $value) {
      $updates[] = "$column = '$value'";
    }
    $updateString = implode(", ", $updates);

    $query = "UPDATE $tableName SET $updateString";

    if ($this->connection->query($query) === true) {
      // Update successful
    } else {
      // Update failed
    }
  }

  public function getCountPage($tableName)
  {
    $query = "SELECT * FROM $tableName";
    $result = $this->connection->query($query);

    if ($result->num_rows > 0) {
      return $result->fetch_assoc();
    }

    return null;
  }
}
?>