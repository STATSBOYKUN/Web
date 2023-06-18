<?php

session_start();
if (!isset($_SESSION['admin'])) {
  echo "<script>alert('You must log in first!');</script>";
  header("Location: ../pages/admin_login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Animisc</title>

  <!-- CSS -->
  <link rel="stylesheet" href="../style/admin_dashboard.css" />
  <link rel="stylesheet" href="../style/notification.css" />
  <link rel="stylesheet" href="../style/loader.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />

</head>

<body>
  <script src="../script/loader.js"></script>
  <div class="loader loader-hidden"></div>
  <aside class="sidebar">
    <div class="sidebar__notification">
      <div class="notification__button">
        <a href="#">
          <img id="notification__logo" src="../assets/Icons/notification.svg" alt="notification" />
        </a>
        <div class="notification__popup" id="notificationPopup">
          <?php include '../pages/notification.php'; ?>
          <div class="notification-overlay"></div>
        </div>
      </div>
    </div>

    <div class="sidebar__logo">
      <img src="../assets/Events/animisc.svg" alt="Animisc" />
    </div>

    <div class="sidebar__title">
      <p>Admin</p>
    </div>

    <div class="sidebar__menu">
      <a href="../pages/admin_dashboard.php">Dashboard</a>
      <a href="../pages/admin_ticket.php">Ticket</a>
      <a href="../pages/admin_users.php">Users</a>
      <a href="../pages/admin_settings.php">Settings</a>

      <div class="sign__button">
        <a href="../pages/logOut.php">
          <button>Log Out</button>
        </a>
      </div>
    </div>
  </aside>

  <div class="dashboard__groups">
    <div class="visitors__card">
      <div class="visitors__title">
        <p>Visitors</p>
      </div>

      <div class="visitors__details">
        <canvas class="visitors__chart" width="400" height="300"></canvas>

        <div class="visitors__numbers">
          <div class="visitors__today">
            <p>Cooming</p>
            <p>Soon !!</p>
          </div>

          <div class="visitors__total">
            <p>Cooming</p>
            <p>Soon !!</p>
          </div>
        </div>
      </div>
    </div>

    <div class="dashboard__wrapper">
      <div class="tickets__groups">
        <div class="tickets__title">
          <p>Tickets Sold</p>
        </div>

        <div class="tickets__details">
          <canvas class="tickets__chart" width="200" height="200"></canvas>

          <div class="tickets__numbers">
            <p>Cooming</p>
            <p>Soon !!</p>
          </div>
        </div>
      </div>

      <div class="users__groups">
        <div class="users__title">
          <p>Users</p>
        </div>

        <div class="users__details">
          <canvas class="users__chart" width="200" height="200"></canvas>

          <div class="users__numbers">
            <p>Cooming</p>
            <p>Soon !!</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../script/admin_dashboard.js"></script>
  <script src="../script/notification.js"></script>
</body>

</html>