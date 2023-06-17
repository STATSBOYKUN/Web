var rememberCheckbox = document.getElementById("rememberCheckbox");
rememberCheckbox.addEventListener("change", setRememberMeCookies);

function setRememberMeCookies() {
  if (rememberCheckbox.checked) {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var expirationDate = new Date();

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
    "You're going to admin-login webpage!\n\nUsername : \nPassword : \n\nUse this to login as admin!\nBe kind and use carefully :)) "
  );
});
