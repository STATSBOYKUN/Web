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

  <link rel="stylesheet" href="../style/about.css" />
  <link rel="stylesheet" href="../style/notification.css" />
  <link rel="stylesheet" href="../style/loader.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
</head>

<body>
  <script src="../script/loader.js"></script>
  <div class="loader loader-hidden"></div>
  <?php include '../controller/counterAbout.php'; ?>
  <navbar>
    <div class="logo">
      <a href="../pages/index">
        <img src="../assets/Logo/logo.png" alt="logo" />
      </a>
    </div>

    <div class="nav__items">
      <ul>
        <li><a href="../pages/index">Home</a></li>
        <li><a href="../pages/events">Events</a></li>
        <li><a href="../pages/community">Community</a></li>
        <li><a href="../pages/about">About</a></li>
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
        <a href="../pages/login">
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
        <p class="p1">Behind of Animisc</p>
        <p class="p2">We've build and connect peoples for years</p>
      </div>

      <div class="ceo__groups fade-in">
        <div class="ceo">
          <img src="../assets/Icons/ceo.png" alt="char" />
          <div class="ceo__title">
            <p>Umarryuu</p>
          </div>
        </div>
        <div class="ceo__text">
          <p class="p1">Welcome and thank you for visiting our website! We greatly appreciate your participation in
            exploring our pages and taking the time to browse through the content we have provided. We are committed to
            offering valuable information, quality services, and a satisfying user experience. Thank you for your
            support, and we hope to continue meeting your expectations with every visit to our website.</p>

          <div class="contact">
            <p class="p2">Chief of Animisc</p>
            <div class="sosmed__icons">
              <a href="https://www.instagram.com/umarhp_">
                <img src="../assets/Icons/instagram.svg" />
              </a>
              <a href="https://www.pinterest.com/">
                <img src="../assets/Icons/pinterest.svg" />
              </a>
              <a href="https://www.linkedin.com/">
                <img src="../assets/Icons/linkedin.svg" />
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="character1">
        <img src="../assets/Char/Char (8).png" alt="char" />
      </div>
      <div class="character2">
        <img src="../assets/Char2/Char2 (4).png" alt="char" />
      </div>
      <div class="character3">
        <img src="../assets/Char3/Char3 (4).png" alt="char" />
      </div>

    </div>

    <script src="../script/notification.js"></script>
    <script src="../script/about.js"></script>
  </main>

  <footer>
    <p>©2023 Animisc. Made with &ensp;</p>
    <p class="love">♥</p>
  </footer>
</body>

</html>