<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Animisc</title>

  <link rel="stylesheet" href="../style/forgot.css" />
  <link rel="stylesheet" href="../style/loader.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
</head>

<body>
  <script src="../script/loader.js"></script>
  <div class="loader loader-hidden"></div>
  <form action="../controller/action_forgot.php" method="post">
    <div class="login__groups">
      <div class="login__title">
        <p>Forgot Password</p>
      </div>

      <div class="login__card">
        <div class="username__items">
          <div class="username__text">
            <p>Email or Telephone Number</p>
          </div>

          <div class="username__input">
            <input type="text" id="username" name="username" placeholder="Enter email or telephone number" required />
          </div>
        </div>

        <div class="forgot__password">
          <p>Reset again in 00:00</p>
        </div>

        <div class="login__button">
          <a href="../pages/index.php">
            <button type="submit" id="sendButton">Send</button>
          </a>
          <img src="../assets/Icons/chevron-right-square.svg" />
        </div>
      </div>

      <div class="character">
        <img src="../assets/Char/Char (6).png" alt="char" />
      </div>
    </div>
  </form>
</body>

</html>