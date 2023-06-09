<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Animisc</title>

  <link rel="stylesheet" href="../style/reset.css" />
  <link rel="stylesheet" href="../style/loader.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
</head>

<body>
  <script src="../script/loader.js"></script>
  <div class="loader loader-hidden"></div>
  <form action="">
    <div class="login__groups">
      <div class="login__title">
        <p>Reset Account</p>
      </div>

      <div class="login__card">
        <div class="hi__account">
          <p>Hi, <span>Username</span></p>
        </div>

        <div class="password__items">
          <div class="password__text">
            <p>Password</p>
          </div>

          <div class="password__input">
            <input type="password" placeholder="Enter password" required />
          </div>
        </div>

        <div class="password__items">
          <div class="password__text">
            <p>Confirm Password</p>
          </div>

          <div class="password__input">
            <input type="password" placeholder="Re-enter password" required />
          </div>
        </div>

        <div class="login__button">
          <a href="../pages/index">
            <button type="submit">Reset</button>
          </a>
          <img src="../assets/Icons/chevron-right-square.svg" />
        </div>

        <div class="have__account">
          <p>
            Have remember your account?
            <a href="../pages/login">Login here</a>
          </p>
        </div>
      </div>
    </div>

    <div class="character">
      <img src="../assets/Char/Char (7).png" alt="char" />
    </div>
  </form>

  <script src="../script/reset.js"></script>
</body>

</html>