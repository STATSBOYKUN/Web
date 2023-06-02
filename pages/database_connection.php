<?php
class DatabaseConnection
{
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "mhs_222112404";
  private $connection;

  public function DatabaseConnection()
  {

  }
  public function connect()
  {
    $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

    if ($this->connection->connect_error) {
      die("Connection failed: " . $this->connection->connect_error);
    }

    echo "Connected successfully!";
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
  }

  public function insertUsers($tableName, $data)
  {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";

    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

    if ($this->connection->query($query) === true) {
      echo "Data inserted successfully!";
    } else {
      echo "Error inserting data: " . $this->connection->error;
    }
  }

  public function insertTickets($tableName, $data)
  {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";

    $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

    if ($this->connection->query($query) === true) {
      echo "Data inserted successfully!";
    } else {
      echo "Error inserting data: " . $this->connection->error;
    }
  }

  public function getUsers($tableName)
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
        echo "</tr>";
      }

      echo "</table>";
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
        echo "</tr>";
      }

      echo "</table>";
    } else {
      echo "No data found.";
    }
  }
}
?>