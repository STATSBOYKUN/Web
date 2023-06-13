<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Animisc</title>

  <!-- CSS -->
  <link rel="stylesheet" href="../style/home.css" />
  <link rel="stylesheet" href="../style/notification.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
</head>

<body>
  <?php include '../controller/counterHome.php'; ?>
  <navbar>
    <div class="logo">
      <!-- image with link -->
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
          <img src="../assets/Icons/notification.svg" alt="notification" />
        </a>
        <div class="notification__popup" id="notificationPopup">
          <?php include '../pages/notification.php'; ?>
          <div class="notification-overlay"></div>
        </div>
      </div>

      <?php
      session_start();

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
        echo '
      <div class="profile">
        <a href="../pages/profile.php">
          <img src="../assets/Icons/profile.svg" alt="profile" />
        </a>

        <div class="profile__items">
          <ul>
            <li><a>Hi, </a></li>
            <li><a href="../pages/logOut.php">Sign Out</a></li>
          </ul>
        </div>
      </div>
      ';
      }
      ?>
    </div>
  </navbar>
  <main>
    <div class="welcome__groups">
      <div class="welcome__items">
        <div class="welcome__text">
          <div class="hi__text">
            <p>👋 Welcome....</p>
          </div>
          <p class="tagline">
            Animisc... <br />
            A Worldwide Events <br />
            and Super Community
          </p>
        </div>

        <div class="welcome__buttons">
          <div class="start__buttons">
            <a href="../pages/index.php#home">
              <button>Get Started</button>
            </a>
            <img src="../assets/Icons/chevron-right-square.svg" />
          </div>

          <div class="about__button">
            <a href="../pages/about.php">
              <button>About Us</button>
            </a>
          </div>
        </div>
      </div>
      <div class="char1">
        <img src="../assets/Char/Char (5).png" alt="char1" />
      </div>
    </div>

    <div class="collaborate__groups">
      <div class="collaborate__text">
        <p>Collaborate With</p>
      </div>

      <div class="collaborate__logo">
        <img src="../assets/Logo/netflix.svg" />
        <img src="../assets/Logo/kyoto.svg" />
        <img src="../assets/Logo/myanimelist 1.svg" />
        <img src="../assets/Logo/reddit.svg" />
      </div>
    </div>

    <div class="home__groups" id="home">
      <div class="home__text">
        <p>What We Do?</p>
      </div>

      <div class="home__cards">
        <div class="events__groups">
          <div class="events__text">
            <p class="p1">Events</p>
            <p class="p2">
              Lalala <br />
              lalalala <br />
              lalala
            </p>
            <a href="../pages/events.php">Visit Events >></a>
          </div>
          <div>
            <img src="../assets/Events/4305916.jpg" alt="" />
          </div>
        </div>

        <div class="community__groups">
          <div class="community__text">
            <p class="p1">Community</p>
            <p class="p2">Lalala lalalala lalala</p>
            <a href="../pages/community.php">Visit Community >></a>
          </div>
          <div>
            <img src="../assets/Events/4305916.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>

    <div class="testimonial__groups">
      <div class="testimonial__titles">
        <p class="p1">Some Generous Words</p>
        <p class="p2">Some of my favorite testimonials from my clients</p>
      </div>

      <div class="testimonial__text">
        <img id="caret__left" src="../assets/Icons/Caret left.svg" />
        <div class="testimonial__items">
          <div class="umaru__items">
            <div class="umaru__text">
              <p>
                “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                nonne merninisti licere mihi ista probare, quae sunt a te
                dicta? Refert tamen, quo modo.
              </p>
            </div>
            <div class="umaru__name">
              <p>Umaru</p>
            </div>
          </div>

          <div class="imika__items">
            <div class="imika__text">
              <p>
                “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                nonne merninisti licere mihi ista probare, quae sunt a te
                dicta? Refert tamen, quo modo.
              </p>
            </div>
            <div class="imika__name">
              <p>Umaru</p>
            </div>
          </div>
        </div>
        <img id="caret__right" src="../assets/Icons/Caret right.svg" />
      </div>
    </div>

    <div class="communication__groups">
      <p>
        Let's work together and make everything super cute and super useful.
      </p>

      <div class="communication">
        <div class="email__button">
          <a href="#">
            <button>Email Me</button>
          </a>
        </div>

        <div class="sosmed__icons">
          <a href="https://www.instagram.com/">
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
  </main>

  <footer>
    <p>©2023 Animisc. Made with &ensp;</p>
    <p class="love">♥</p>
  </footer>

  <script src="../script/home.js"></script>
  <script src="../script/notification.js"></script>

</body>

</html>