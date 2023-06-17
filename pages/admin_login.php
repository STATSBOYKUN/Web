<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Animisc</title>

  <link rel="stylesheet" href="../style/admin_login.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
  <script src="../script/admin_login.js"></script>
</head>

<body>
  <form id="admin_login_form" action="../controller/action_admin.php" method="post">
    <div class="login__groups">
      <div class="login__title">
        <p>Admin Login</p>
      </div>

      <div class="login__card">
        <div class="username__items">
          <div class="username__text">
            <p>Username or Email</p>
          </div>

          <div class="username__input">
            <input type="text" id="username" name="username" placeholder="Enter username or email" required />
          </div>
        </div>

        <div class="password__items">
          <div class="password__text">
            <p>Password</p>
          </div>

          <div class="password__input">
            <input type="password" id="password" name="password" placeholder="Enter password" required />
          </div>
        </div>

        <div class="login__button">
          <a>
            <button type="submit">Login</button>
          </a>
          <img src="../assets/Icons/chevron-right-square.svg" />
        </div>

        <div class="forgot__pasword">
          <p>
            Not an admin?
            <a href="../pages/login.php">Click here</a>
          </p>
        </div>
      </div>
    </div>

    <div class="character">
      <img src="../assets/Char/Char (4).png" alt="char" />
    </div>
  </form>
</body>

</html>