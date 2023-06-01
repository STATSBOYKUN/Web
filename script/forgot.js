function validateEmail(email) {
  const emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
  return emailRegex.test(email);
}

function validateTelephone(telephone) {
  const telephoneRegex = /^\d{10}$/;
  return telephoneRegex.test(telephone);
}

function padZero(number) {
  return number.toString().padStart(2, "0");
}

function handleSubmit(event) {
  event.preventDefault();

  const inputField = document.querySelector('input[type="text"]');
  const value = inputField.value.trim();

  const isEmailValid = validateEmail(value);
  const isTelephoneValid = validateTelephone(value);

  if (isEmailValid || isTelephoneValid) {
    var sendButton = document.getElementById("sendButton");
    sendButton.disabled = true;

    var countdownElement = document.querySelector(".forgot__password p");
    var countdownTime = 120;

    var countdownInterval = setInterval(function () {
      countdownTime--;
      var minutes = Math.floor(countdownTime / 60);
      var seconds = countdownTime % 60;

      countdownElement.textContent =
        "Reset again in " + padZero(minutes) + ":" + padZero(seconds);

      if (countdownTime <= 0) {
        clearInterval(countdownInterval);
        countdownElement.textContent = "Reset again in 00:00";
        sendButton.disabled = false;
      }
    }, 1000);
    alert("Reset link : reset.html");
  } else {
    alert("Please enter a valid email or telephone number");
  }
}
