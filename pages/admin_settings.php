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

  <link rel="stylesheet" href="../style/admin_settings.css" />
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
      <a href="../pages/admin_dashboard">Dashboard</a>
      <a href="../pages/admin_ticket">Ticket</a>
      <a href="../pages/admin_users">Users</a>
      <a href="../pages/admin_settings">Settings</a>

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
                type="password" name="confirmPassword" id="confirmPassword"
                title="Password must be at least 8 combination of alphanumeric and special character"
                placeholder="Re-enter password" required />
            </div>
          </div>

          <div class="login__button">
            <a href="../pages/index">
              <button type="submit">Change</button>
            </a>
            <img src="../assets/Icons/chevron-right-square.svg" />
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="../script/admin_settings.js"></script>
  <script src="../script/notification.js"></script>
</body>

</html>