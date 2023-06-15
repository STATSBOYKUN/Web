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
  <link rel="stylesheet" href="../style/admin_settings.css" />
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
  <div class="visitors__card">
    <form action="../controller/action_settings.php" method="post">
      <div class="login__groups">
        <div class="login__title">
          <p>Change Password</p>
        </div>

        <div class="login__card">
          <div class="password__items">
            <div class="password__text">
              <p>Password</p>
            </div>

            <div class="password__input">
              <input pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=!])(?=.*[a-zA-Z\d@#$%^&+=!]).{8,}$"
                title="Password must be at least 8 combination of alphanumeric and special character" type="password"
                name="password" id="password" placeholder="Enter password" required />
            </div>
          </div>

          <div class="password__items">
            <div class="password__text">
              <p>Confirm Password</p>
            </div>

            <div class="password__input">
              <input pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=!])(?=.*[a-zA-Z\d@#$%^&+=!]).{8,}$"
                type="confirmPassword" name="confirmPassword" id="password"
                title="Password must be at least 8 combination of alphanumeric and special character"
                placeholder="Re-enter password" required />
            </div>
          </div>

          <div class="login__button">
            <a href="../pages/index.php">
              <button type="submit">Change</button>
            </a>
            <img src="../assets/Icons/chevron-right-square.svg" />
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="../script/admin_settings.js"></script>
</body>

</html>