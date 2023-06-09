<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('HTTP/1.0 403 Forbidden', TRUE, 403);
  die(header('location: ../pages/error'));
}
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

    $query = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";

    $stmt = $this->connection->prepare($query);

    $bindTypes = "";
    $bindParams = [];

    foreach ($data as $value) {
      if (is_string($value)) {
        $bindTypes .= "s";
      } else {
        $bindTypes .= "b";
      }

      $bindParams[] = $value;
    }

    $stmt->bind_param($bindTypes, ...$bindParams);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
    } else {
    }

    $stmt->close();
  }

  public function getUsers($tableName)
  {
    $query = "SELECT * FROM $tableName";
    $result = $this->connection->query($query);
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Email</th>";
    echo "<th>Username</th>";
    echo "<th>Sex</th>";
    echo "<th>Telephone</th>";
    echo "<th>Age</th>";
    echo "<th>Country</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
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

    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Full Name</th>";
    echo "<th>Email</th>";
    echo "<th>Order Date</th>";
    echo "<th>Tickets</th>";
    echo "<th>Invoices</th>";
    echo "<th>Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";

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

    $sumRead = 0;

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sumRead += $row['read'];

        echo "<div class='notification__body' style='background: " . ($row['read'] == 0 ? 'none' : '#ffddbf') . ";'>";
        echo "<div class='notification__image'>";
        echo "<img src='../assets/Events/animisc.svg' alt='logo' />";
        echo "</div>";
        echo "<div class='notification__text'>";
        echo "<div class='notification__text1'>";
        echo "" . $row['text'];
        echo "</div>";
        echo "<div class='notification__text2'>Admin •";

        $timezone = new DateTimeZone('Asia/Jakarta');

        $rowDate = new DateTime($row['time'], $timezone);
        $dateTime = new DateTime(null, $timezone);

        $interval = $dateTime->diff($rowDate);
        $yearsDifference = $interval->y;
        $monthsDifference = $interval->m;
        $daysDifference = $interval->d;
        $hoursDifference = $interval->h;
        $minutesDifference = $interval->i;
        $secondsDifference = $interval->s;

        if ($yearsDifference > 0) {
          echo " ({$yearsDifference} years ago)";
        } elseif ($monthsDifference > 0) {
          echo " ({$monthsDifference} months ago)";
        } elseif ($daysDifference > 0) {
          echo " ({$daysDifference} days ago)";
        } elseif ($hoursDifference > 0) {
          echo " ({$hoursDifference} hours ago)";
        } elseif ($minutesDifference > 0) {
          echo " ({$minutesDifference} minutes ago)";
        } else {
          echo " ({$secondsDifference} seconds ago)";
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

    if ($sumRead == 0) {
      echo "<script>";
      echo "document.getElementById('notification__logo').src = '../assets/Icons/notification.svg';";
      echo "</script>";
    } else {
      echo "<script>";
      echo "document.getElementById('notification__logo').src = '../assets/Icons/notification-up.svg';";
      echo "</script>";
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
    } else {
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
    } else {
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
    } else {
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

  public function hintUsers($tableName, $searchData)
  {
    $conditions = [];
    foreach ($searchData as $field => $value) {
      $conditions[] = "$field LIKE '%$value%'";
    }
    $conditionString = implode(" OR ", $conditions);

    $query = "SELECT * FROM $tableName WHERE $conditionString";

    $result = $this->connection->query($query);

    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Email</th>";
    echo "<th>Username</th>";
    echo "<th>Sex</th>";
    echo "<th>Telephone</th>";
    echo "<th>Age</th>";
    echo "<th>Country</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";
    echo "</tr>";
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
      echo "<p>";
      echo "No data found.";
      echo "</p>";
    }
  }

  public function hintTickets($tableName, $searchData)
  {
    $conditions = [];
    foreach ($searchData as $field => $value) {
      $conditions[] = "$field LIKE '%$value%'";
    }
    $conditionString = implode(" OR ", $conditions);

    $query = "SELECT * FROM $tableName WHERE $conditionString";

    $result = $this->connection->query($query);

    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Full Name</th>";
    echo "<th>Email</th>";
    echo "<th>Order Date</th>";
    echo "<th>Tickets</th>";
    echo "<th>Invoices</th>";
    echo "<th>Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
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
      echo "<p>";
      echo "No data found.";
      echo "</p>";
    }
  }

  public function createNotification($tableName, $data)
  {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";

    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

    if ($this->connection->query($query) === true) {
    } else {
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
    } else {
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