// Check if Remember Me checkbox is checked on page load
window.addEventListener('load', function() {
  var rememberCheckbox = document.getElementById('rememberCheckbox');

  // If the checkbox is checked, set the cookies
  if (rememberCheckbox.checked) {
    setRememberMeCookies();
  }
});

function handleSubmit(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  var username = document.querySelector('input[type="text"]').value;
  var password = document.querySelector('input[type="password"]').value;

  // Make AJAX request to check email and password against database
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'action_login.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        if (response === 'valid') {
          alert('Login successful!');
          // Redirect to the desired page
          window.location.href = 'index.php';
        } else {
          alert('Invalid username or password.');
          window.location.href = 'index.php';
        }
      } else {
        alert('Error: ' + xhr.status);
      }
    }
  };
  xhr.send('username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password));
  setRememberMeCookies();
}

function setRememberMeCookies() {
  var rememberCheckbox = document.getElementById('rememberCheckbox');
  if (rememberCheckbox.checked) {
    var username = document.querySelector('input[type="text"]').value;
    var password = document.querySelector('input[type="password"]').value;
    var expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + 30); // 30 days from now

    // Set cookies
    document.cookie = 'username=' + encodeURIComponent(username) + '; expires=' + expirationDate.toUTCString() + '; path=/';
    document.cookie = 'password=' + encodeURIComponent(password) + '; expires=' + expirationDate.toUTCString() + '; path=/';
  }
}

// Get the image element by its ID
var image = document.getElementById('characterImage');

// Add click event listener to the image
image.addEventListener('click', function() {
  alert("You're going to admin-login webpage!\n\nUsername : guest\nPassword : guest\n\nUse this to login as admin!\nBe kind and use carefully :)) ");
});

// Get the form element by its ID
var form = document.getElementById('loginForm');

// Add submit event listener to the form
form.addEventListener('submit', handleSubmit);


// Get the image element by its ID
var image = document.getElementById("characterImage");

// Add click event listener to the image
image.addEventListener("click", function() {
  alert("You're going to admin-login webpage!\n\nUsername : guest\nPassword : guest\n\nUse this to login as admin!\nBe kind and use carefully :)) ");
});