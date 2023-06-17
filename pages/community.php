<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Animisc</title>

  <link rel="stylesheet" href="../style/community.css" />
  <link rel="stylesheet" href="../style/notification.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
</head>

<body>
  <?php include '../controller/counterCommunity.php'; ?>
  <navbar>
    <div class="logo">
      <a href="../pages/index.php">
        <img src="../assets/Logo/logo.png" alt="logo" />
      </a>
    </div>

    <div class="nav__items">
      <ul>
        <li><a href="../pages/index.php">Home</a></li>
        <li><a href="../pages/events.php">Events</a></li>
        <li><a href="../pages/community.php">Community</a></li>
        <li><a href="../pages/about.php">About</a></li>
      </ul>
    </div>

    <div class="users__items">
      <div class="notification__button">
        <a href="#">
          <img id="notification__logo" src="../assets/Icons/notification.svg" alt="notification" />
        </a>
        <div class="notification__popup" id="notificationPopup">
          <?php include '../pages/notification.php'; ?>
          <div class="notification-overlay"></div>
        </div>
      </div>

      <?php
      if (isset($_SESSION['start'])) {
        $_SESSION['start'] = time();
      }

      if (isset($_SESSION['start']) && time() - $_SESSION['start'] > 900) {
        session_unset();
        session_destroy();
      }

      if (!isset($_SESSION['username'])) {
        echo '
      <div class="sign__button">
        <a href="../pages/login.php">
          <button>Sign In</button>
        </a>
      </div>
      ';
      } else {
        echo '<script src="../script/profile.js"></script>';
        echo '
      <div id="profile" class="profile">
        <a href="#">
          <img id="profile__img" src="" alt="profile" />
        </a>
      </div>

      <div id="profile__items" class="profile__items">
        <ul>
          <li><img src="../assets/Icons/bx-user-circle.svg" alt="profile" />Hi, 
        ';
        echo $username;

        echo ' </li>
          <li><img src="../assets/Icons/bx-log-out.svg" alt="profile" /><a href="../pages/logOut.php">Sign Out</a></li>
        </ul>
      </div>
      ';
      }
      ?>
    </div>
  </navbar>
  <main>
    <div class="testimonial__groups">
      <div class="testimonial__titles">
        <p class="p1">"One Vision, One Voice, One World."</p>
      </div>

      <div class="start__buttons">
        <img src="../assets/Icons/reddit-logo.png" />
        <a href="https://reddit.com/">
          <button>/Animisc</button>
        </a>
      </div>
    </div>

    <script src="../script/notification.js"></script>
  </main>

  <footer>
    <p>©2023 Animisc. Made with &ensp;</p>
    <p class="love">♥</p>
  </footer>
</body>

</html>