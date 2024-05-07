document.querySelector("form").addEventListener("submit", function (event) {
  var password = document.querySelector(
    '.password__items input[type="password"]'
  ).value;
  var confirmPassword = document.querySelectorAll(
    '.password__items input[type="password"]'
  )[1].value;

  if (password.trim() === "") {
    alert("Please enter your password.");
    return;
  }

  if (confirmPassword.trim() === "") {
    alert("Please re-enter your password.");
    return;
  }

  if (password !== confirmPassword) {
    alert("Passwords do not match. Please re-enter your password.");
    return;
  }

  if (!isStrongPassword(password)) {
    alert(
      "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one number, and one special character."
    );
    return;
  }

  alert("Password reset successfully!");
});

function isStrongPassword(password) {
  var passwordPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+[{\]}\\|;:'",<.>/?]).{8,}$/;
  return passwordPattern.test(password);
}
