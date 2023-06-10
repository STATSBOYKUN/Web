event.preventDefault(); 
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
