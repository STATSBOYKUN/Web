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

  <!-- CSS -->
  <link rel="stylesheet" href="../style/admin_usersUpdate.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
</head>

<body>
  <script src="../script/admin_usersUpdate.js"></script>
  <aside class="sidebar">
    <div class="sidebar__notification">
      <a href="../pages/notification.php">
        <img src="../assets/Icons/notification.svg" alt="notification" />
      </a>
    </div>

    <div class="sidebar__logo">
      <img src="../assets/Events/animisc.svg" alt="Animisc" />
    </div>

    <div class="sidebar__title">
      <p>Admin</p>
    </div>

    <div class="sidebar__menu">
      <a href="../pages/admin_dashboard.php">Dashboard</a>
      <a href="../pages/admin_ticket.php">Ticket</a>
      <a href="../pages/admin_users.php">Users</a>
      <a href="../pages/admin_settings.php">Settings</a>

      <div class="sign__button">
        <a href="../pages/logOut.php">
          <button>Log Out</button>
        </a>
      </div>
    </div>
  </aside>
  <div class="visitors__card">
    <?php
    include '../controller/getData.php';
    ?>
    <form action="../controller/action_adminUsersUpdate.php?id=<?php echo $id; ?> " method="post">
      <div class="login__groups">
        <div class="login__title">
          <p>Edit Users</p>
        </div>

        <div class="login__card">

          <div class="signemail__items">
            <div class="signemail__text">
              <p>Email</p>
            </div>

            <div class="signemail__input">
              <input type="email" name="email" id="email" placeholder="Enter email"
                pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter email correctly :)"
                value="<?php echo $email; ?>" required />
            </div>
          </div>

          <div class="signusername__items">
            <div class="signusername__text">
              <p>Username</p>
            </div>

            <div class="signusername__input">
              <input type="text" pattern="^[a-z0-9]{4,16}$" name="username" id="username" placeholder="Enter username"
                title="Username must be lowercase and contain at least 4 characters" value="<?php echo $username; ?>"
                required />
            </div>
          </div>

          <div class="signsex__items">
            <div class="signsex__text">
              <p>Sex</p>
            </div>

            <div class="signsex__input">
              <div class="signsex__box">
                <input type="radio" name="sex" id="male" value="male" checked />
                <p>Male</p>
              </div>
              <div class="signsex__box">
                <input type="radio" name="sex" id="female" value="female" />
                <p>Female</p>
              </div>
            </div>
          </div>

          <div class="signage__items">
            <div class="signage__text">
              <p>Age</p>
            </div>

            <div class="signage__input">
              <input type="number" name="age" id="age" value="17" min="12" max="70" value="<?php echo $age; ?>"
                required />
            </div>
          </div>

          <div class="signcountry__items">
            <div class="signcountry__text">
              <p>Country</p>
            </div>

            <div class="signcountry__input">
              <select name="country" id="country" required>
                <?php
                $countries = array(
                  "Brunei",
                  "Burma",
                  "Cambodia",
                  "China",
                  "Hong Kong",
                  "Indonesia",
                  "Japan",
                  "North Korea",
                  "South Korea",
                  "Laos",
                  "Malaysia",
                  "Philippines",
                  "Singapore",
                  "Taiwan",
                  "Thailand",
                  "Timor-Leste",
                  "Vietnam"
                );

                foreach ($countries as $countryOption) {
                  $selected = ($country === $countryOption) ? "selected" : "";
                  echo "<option value=\"$countryOption\" $selected>$countryOption</option>";
                }
                ?>
              </select>
            </div>

          </div>

          <div class="signtelephone__items">
            <div class="signtelephone__text">
              <p>Telephone Number</p>
            </div>

            <div class="signtelephone__input">
              <input type="text" pattern="^\d{9,15}$" name="telephone" id="telephone"
                placeholder="Enter telephone number" title="Please enter a valid telephone number :)"
                value="<?php echo $telephone; ?>" required />
            </div>
          </div>

          <div class="password__items">
            <div class="password__text">
              <p>Password</p>
            </div>

            <div class="password__input">
              <input pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=!])(?=.*[a-zA-Z\d@#$%^&+=!]).{8,}$"
                type="password" name="password" id="password" placeholder="Enter password"
                title="Password must be at least 8 combination of alphanumeric and special character" required />
            </div>
          </div>

          <div class="password__items">
            <div class="password__text">
              <p>Confirm Password</p>
            </div>

            <div class="password__input">
              <input type="password" name="confirmPassword" id="confirmPassword"
                pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=!])(?=.*[a-zA-Z\d@#$%^&+=!]).{8,}$"
                placeholder="Re-enter password" required />
            </div>
          </div>

          <div class="login__button">
            <a href="../pages/index.php">
              <button type="submit">Change</button>
            </a>
            <img src="../assets/Icons/chevron-right-square.svg" />
          </div>
        </div>
    </form>
  </div>
</body>

</html>