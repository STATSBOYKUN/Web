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
    $values = "'" . implode("', '", array_values($data)) . "'";

    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

    if ($this->connection->query($query) === true) {
    } else {
    }
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
        echo "<td> <a href=''><img src='../assets/Icons/bx-edit.svg'/></a></td>";
        echo "<td> <a href=''><img id='img2' src='../assets/Icons/bx-trash.svg' alt=''/></a></td>";
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
      echo "<table>";
      echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['tickets'] . "</td>";
        echo "<td>" . $row['invoices'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
      }

      echo "</table>";
    } else {
      echo "No data found.";
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
}


?>