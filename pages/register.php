<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Animisc</title>

  <link rel="stylesheet" href="../style/signup.css" />
  <link rel="icon" href="../assets/Logo/title.svg" type="image/png" />
</head>

<body>
  <script src="../script/register.js"></script>
  <form action="../controller/action_register.php" method="post">
    <div class="signup__groups">
      <div class="signup__title">
        <p>Sign Up</p>
      </div>

      <div class="signup__card">
        <div class="signemail__items">
          <div class="signemail__text">
            <p>Email</p>
          </div>

          <div class="signemail__input">
            <input type="email" name="email" id="email" placeholder="Enter email"
              pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter email correctly :)" required />
          </div>
        </div>

        <div class="signusername__items">
          <div class="signusername__text">
            <p>Username</p>
          </div>

          <div class="signusername__input">
            <input type="text" pattern="^[a-z0-9]{4,16}$" name="username" id="username" placeholder="Enter username"
              title="Username must be lowercase and contain at least 4 characters" required />
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
            <input type="number" name="age" id="age" value="17" min="12" max="70" required />
          </div>
        </div>

        <div class="signcountry__items">
          <div class="signcountry__text">
            <p>Country</p>
          </div>

          <div class="signcountry__input">
            <select name="country" id="country" required>
              <option value="Brunei">Brunei</option>
              <option value="Burma">Burma</option>
              <option value="Cambodia">Cambodia</option>
              <option value="China">China</option>
              <option value="Hong Kong">Hong Kong</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Japan">Japan</option>
              <option value="North Korea">North Korea</option>
              <option value="South Korea">South Korea</option>
              <option value="Laos">Laos</option>
              <option value="Malaysia">Malaysia</option>
              <option value="Philippines">Philippines</option>
              <option value="Singapore">Singapore</option>
              <option value="Taiwan">Taiwan</option>
              <option value="Thailand">Thailand</option>
              <option value="Timor-Leste">Timor-Leste</option>
              <option value="Vietnam">Vietnam</option>
            </select>
          </div>
        </div>

        <div class="signtelephone__items">
          <div class="signtelephone__text">
            <p>Telephone Number</p>
          </div>

          <div class="signtelephone__input">
            <input type="text" pattern="^\d{9,15}$" name="telephone" id="telephone" placeholder="Enter telephone number"
              title="Please enter a valid telephone number :)" required />
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

        <div class="signagree__input">
          <input type="checkbox" placeholder="Enter password" required />
          <p>I agree to the Terms of Service and Privacy Policy.</p>
        </div>

        <div class="signup__button">
          <a href="../pages/index.php">
            <button type="submit" value="Sign Up"">Sign Up</button>
            </a>
            <img src=" ../assets/Icons/chevron-right-square.svg" />
        </div>

        <div class="have__account">
          <p>Have an account? <a href="../pages/login.php">Login here</a></p>
        </div>
      </div>
    </div>
  </form>
  <div class="character">
    <img src="../assets/Char3/Char3 (12).png" alt="char" />
  </div>
</body>

</html>