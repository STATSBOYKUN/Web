function handleSubmit(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  // Make AJAX request to check username and password against database
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../pages/action_admin.php", true);

  xhr.onreadystatechange = function() {
    console.log(xhr.readyState); // Log the readyState
    console.log(xhr.status); // Log the status
    console.log(xhr.responseText); // Log the responseText
    if (xhr.readyState === XMLHttpRequest.DONE) {
      console.log(xhr.readyState); // Log the readyState
      console.log(xhr.status); // Log the status
      console.log(xhr.responseText); // Log the responseText

      if (xhr.status === 200) {
        var response = xhr.responseText;
        if (response === "valid") {
          alert("Login successful!");
          // Redirect to the desired page
          window.location.href = "../pages/admin_users.php";
        } else {
          alert("Invalid username or password.");
        }
      } else {
        alert("Error: " + xhr.status);
      }
    }
  };

  xhr.send("username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password));
}
