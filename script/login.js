var rememberCheckbox = document.getElementById("rememberCheckbox");
var usernameInput = document.getElementById("username");
var passwordInput = document.getElementById("password");

usernameInput.addEventListener("input", setRememberMeCookies);
passwordInput.addEventListener("input", setRememberMeCookies);
rememberCheckbox.addEventListener("change", setRememberMeCookies);

function setRememberMeCookies() {
  if (rememberCheckbox.checked) {
    var username = usernameInput.value;
    var password = passwordInput.value;
    var expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + 30);

    document.cookie =
      "username=" +
      encodeURIComponent(username) +
      "; expires=" +
      expirationDate.toUTCString() +
      "; path=/";
    document.cookie =
      "password=" +
      encodeURIComponent(password) +
      "; expires=" +
      expirationDate.toUTCString() +
      "; path=/";
  }
}

var image = document.getElementById("characterImage");

image.addEventListener("click", function () {
  alert(
    "You're going to admin-login webpage!\n\nUsername : guest \nPassword : guest\n\nUse this to login as admin!\nBe kind and use carefully :))"
  );
});
