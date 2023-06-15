<?php

session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>alert('You must log in first!');</script>";
  header("Location: ../pages/login.php");
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
  <link rel="stylesheet" href="../style/ticket.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />

</head>

<body>
  <form action="../controller/action_ticket.php" method="post" enctype="multipart/form-data">
    <div class="ticket__groups">
      <div class="ticket__title">
        <div class="events__logo">
          <img src="../assets/Events/animisc.svg" alt="logo" />
        </div>
        <div class="event__title">
          <p>Animisc Open House</p>
        </div>
        <div class="events__logo">
          <img src="../assets/Events/animisc.svg" alt="logo" />
        </div>
      </div>

      <div class="ticket__card">
        <div class="name__items">
          <div class="name__text">
            <p>Full Name</p>
          </div>

          <div class="name__input">
            <input id="name" name="name" type="text" placeholder="Enter name" pattern="[A-Za-z]{3,32}$"
              title="Please enter name correctly" required />
            <input type="hidden" id="status" name="status" value="Review">
          </div>
        </div>

        <div class="number__items">
          <div class="number__text">
            <p>Number of Tickets</p>
          </div>

          <div class="number__input">
            <input id="tickets" name="tickets" onchange="handleTicketChange(event)" type="number" value="1" min="1"
              max="5" required />
          </div>
        </div>

        <div class="file__items">
          <div class="file__text">
            <p>Attach Invoices File (max. 300KB)</p>
          </div>

          <div class="file__input">
            <input id="invoices" name="invoices" type="file" accept=".jpg, .jpeg, .png" value="" required />
          </div>
        </div>

        <div class="payment__details">
          <div class="payments__title">
            <p>Payment Details</p>
          </div>

          <div class="payments__info">
            <p class="p1">Tickets</p>
            <p class="p2">Rp 25.000,00</p>
          </div>

          <div class="payments__info">
            <p class="p1">Tax</p>
            <p class="p2">Rp 0,00</p>
          </div>

          <div class="payments__info">
            <p class="p1">Payment Code</p>
            <p class="p2">Rp 11,00</p>
          </div>

          <div class="payments__title">
            <p class="p1">Total</p>
            <p class="p2">Rp 25.011,00</p>
          </div>
        </div>

        <div class="order__button">
          <a href="../pages/index.php">
            <button type="submit">Order</button>
          </a>
          <img src="../assets/Icons/chevron-right-square.svg" />
        </div>
      </div>
    </div>

    <div class="character">
      <img src="../assets/Char/Char (10).png" alt="char" />
    </div>
  </form>
  <script src="../script/update__payment.js"></script>
  <script src="../script/ticket.js"></script>
</body>

</html>