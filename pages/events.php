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

  <link rel="stylesheet" href="../style/events.css" />
  <link rel="stylesheet" href="../style/notification.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
</head>

<body>
  <?php include '../controller/counterEvents.php'; ?>
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
          <img id="profile__img" src="../assets/Icons/avatars/Asset 8.svg" alt="profile" />
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
    <div class="events__cards">
      <div class="events__logo">
        <img src="../assets/Events/animisc.svg" alt="logo" />
      </div>

      <div class="events__titles">
        <p class="p1">Animisc Open House</p>
        <p class="p2">Buy tickets now! Event will be held in :</p>
      </div>

      <div class="time__cards">
        <div class="time__boxs">
          <p id="days" class="counter">00</p>
          <p class="time">days</p>
        </div>

        <div class="time__boxs">
          <p id="hours" class="counter">00</p>
          <p class="time">hrs</p>
        </div>

        <div class="time__boxs">
          <p id="minutes" class="counter">00</p>
          <p class="time">mins</p>
        </div>

        <div class="time__boxs">
          <p id="seconds" class="counter">00</p>
          <p class="time">secs</p>
        </div>
      </div>
    </div>

    <div class="guest__groups">
      <div class="guest__title">
        <p>Special Guest</p>
      </div>

      <div class="guest__cards">
        <div class="guest__boxs">
          <div class="guest__images">
            <img src="../assets/Events/yoasobi.png" />
          </div>
          <div class="guest__names">
            <p class="p1">YOASOBI</p>
            <p class="p2">Top Anime Singer</p>
          </div>
        </div>

        <div class="guest__boxs">
          <div class="guest__images">
            <img src="../assets/Events/kobo.jpg" />
          </div>
          <div class="guest__names">
            <p class="p1">Kobo</p>
            <p class="p2">Master of Ceremony</p>
          </div>
        </div>

        <div class="guest__boxs">
          <div class="guest__images">
            <img src="../assets/Events/kenshi.jpg" />
          </div>
          <div class="guest__names">
            <p class="p1">Kenshi Yonezu</p>
            <p class="p2">Top Anime Singer</p>
          </div>
        </div>
      </div>
    </div>

    <div class="specialguest__groups">
      <div class="specialguest__title">
        <p>Special Performance</p>
      </div>

      <div class="specialguest__cards">
        <div class="specialguest__boxs">
          <div class="specialguest__images">
            <img src="../assets/Events/minasa ikirawa.png" />
          </div>
          <div class="specialguest__names">
            <p>Minasa Ikirawa</p>
          </div>
        </div>
      </div>

      <div class="buy__buttons">
        <a href="../pages/ticket.php">
          <button>Buy Ticket</button>
        </a>
      </div>
    </div>


  </main>

  <footer>
    <p>©2023 Animisc. Made with &ensp;</p>
    <p class="love">♥</p>
  </footer>

  <script src="../script/events.js"></script>
  <script src="../script/notification.js"></script>
</body>

</html>