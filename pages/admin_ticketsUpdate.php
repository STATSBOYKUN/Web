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

  <link rel="stylesheet" href="../style/admin_ticketsUpdate.css" />
  <link rel="stylesheet" href="../style/notification.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
</head>

<body>
  <aside class="sidebar">
    <div class="sidebar__notification">
    <div class="notification__button">
        <a href="#">
          <img id="notification__logo" src="../assets/Icons/notification.svg" alt="notification" />
        </a>
        <div class="notification__popup" id="notificationPopup">
          <?php include '../pages/notification.php'; ?>
          <div class="notification-overlay"></div>
        </div>
      </div>
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
    include '../controller/getTicket.php';
    ?>
    <form action="../controller/action_adminTicketsUpdate.php?id=<?php echo $id; ?> " method="post">
      <div class="login__groups">
        <div class="login__title">
          <p>Edit Tickets</p>
        </div>

        <div class="login__card">

          <div class="signemail__items">
            <div class="signemail__text">
              <p>Full Name</p>
            </div>

            <div class="signemail__input">
              <p>
                <?php echo $name; ?>
              </p>
            </div>
          </div>

          <div class="signusername__items">
            <div class="signusername__text">
              <p>Email</p>
            </div>

            <div class="signusername__input">
              <p>
                <?php echo $email; ?>
              </p>

              <input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
            </div>
          </div>

          <div class="signsex__items">
            <div class="signsex__text">
              <p>Order Date</p>
            </div>

            <div class="signsex__input">
              <p>
                <?php echo $date; ?>
              </p>
            </div>
          </div>

          <div class="signage__items">
            <div class="signage__text">
              <p>Number of Tickets</p>
            </div>

            <div class="signage__input">
              <p>
                <?php echo $tickets; ?>
              </p>
            </div>
          </div>

          <div class="signcountry__items">
            <div class="signcountry__text">
              <p>Invoices</p>
            </div>

            <div class="signcountry__input">
              <p>
                <?php $invoicePath = "../assets/dataImage/" . $invoices;
                echo "<a href='$invoicePath' class='invoice-link'>View Invoice</a>";
                ?>
              </p>
            </div>

          </div>

          <div class="signtelephone__items">
            <div class="signtelephone__text">
              <p>Status</p>
            </div>

            <div class="signcountry__input">
              <select name="status" id="status" required>
                <?php
                $statusArray = array(
                  "Pending",
                  "Approved",
                  "Rejected"
                );

                foreach ($statusArray as $statusOption) {
                  $selected = ($status === $statusOption) ? "selected" : "";
                  echo "<option value=\"$statusOption\" $selected>$statusOption</option>";
                }
                ?>

              </select>
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

  <script src="../script/admin_ticketUpdate.js"></script>
  <script src="../script/preview__invoices.js"></script>
  <script src="../script/notification.js"></script>
</body>

</html>