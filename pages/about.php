<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Animisc</title>

  <!-- CSS -->
  <link rel="stylesheet" href="../style/about.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
</head>

<body>
  <?php include '../controller/counterAbout.php'; ?>
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
      <div class="notification">
        <a href="../pages/notification.php">
          <img src="../assets/Icons/notification.svg" alt="notification" />
        </a>
      </div>

      <div class="sign__button">
        <a href="../pages/login.php">
          <button>Sign In</button>
        </a>
      </div>
    </div>
  </navbar>
  <main>
    <div class="testimonial__groups">
      <div class="testimonial__titles">
        <p class="p1">Behind of Animisc</p>
        <p class="p2">We've build and connect peoples for years</p>
      </div>

      <div class="ceo__groups">
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

          <p class="p2">Chief of Animisc</p>
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
  </main>

  <footer>
    <p>©2023 Animisc. Made with &ensp;</p>
    <p class="love">♥</p>
  </footer>
</body>

</html>