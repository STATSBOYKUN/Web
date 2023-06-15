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
    <link rel="stylesheet" href="../style/admin_ticket.css" />
    <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
  </head>
  <body>
    <aside class="sidebar">
      <div class="sidebar__notification">
        <a href="../pages/notification.php">
          <img src="../assets/Icons/notification.svg" alt="notification" />
        </a>
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
      <div class="dashboard__wrapper">
        <div class="visitors__title">
          <p>Tickets</p>
        </div>

        <form action="">
          <div class="search__wrapper">
            <div class="search__input">
              <input type="text" placeholder="Search ...." required />
            </div>

            <div class="sign__button">
              <a href="#">
                <button>Search</button>
              </a>
            </div>
          </div>
        </form>
      </div>

      <div class="visitors__card">
        <div class="table__wrapper">
          <!-- table -->
          <table>
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Order Date</th>
              <th>Tickets</th>
              <th>Invoices</th>
              <th>Status</th>
              <th>Action</th>
            </tr>

            <?php
              require_once("../controller/action_adminTickets.php");
            ?>
          </table>
        </div>
      </div>
    </div>
    <script src="../script/admin_ticket.js"></script>
    <script src="../script/preview__invoices.js"></script>
  </body>
</html>
