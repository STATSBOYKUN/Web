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

    <!-- CSS -->
    <link rel="stylesheet" href="../style/login.css" />
    <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
  </head>
  <body>
    <div class="login__groups">
      <div class="login__title">
        <p>Login</p>
      </div>
      <form onsubmit="handleSubmit(event)" action="">
        <div class="login__card">
          <div class="username__items">
            <div class="username__text">
              <p>Username or Email</p>
            </div>

            <div class="username__input">
              <input type="text" placeholder="Enter username or email" required/>
            </div>
          </div>

          <div class="password__items">
            <div class="password__text">
              <p>Password</p>
            </div>

            <div class="password__input">
              <input type="password" placeholder="Enter password" required />
            </div>
          </div>

          <div class="forgot__pasword">
            <a href="../pages/forgot.php">Forgot Password?</a>

            <div class="signagree__input">
              <input type="checkbox" placeholder="Enter password"/>
              <p>Remember Me</p>
            </div>
          </div>

          <div class="login__button">
            <a href="../pages/index.php">
              <button type="submit">Login</button>
            </a>
            <img src="../assets/Icons/chevron-right-square.svg" />
          </div>


          <div class="have__account">
            <p>
              Don't have an account?
              <a href="../pages/register.php">Register here</a>
            </p>
          </div>
        </div>
      </form>
    </div>

    <div class="character">
      <a href="../pages/admin_login.php">
        <img id="characterImage" src="../assets/Char2/Char2 (1).png" alt="char" />
      </a>
    </div>

    <script src="../script/login.js"></script>
  </body>
</html>
