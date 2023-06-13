// Add an event listener to the rememberCheckbox element
var rememberCheckbox = document.getElementById('rememberCheckbox');
rememberCheckbox.addEventListener('change', setRememberMeCookies);

// Function to set remember me cookies
function setRememberMeCookies() {
  if (rememberCheckbox.checked) {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
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
  alert("You're going to admin-login webpage!\n\nUsername : \nPassword : \n\nUse this to login as admin!\nBe kind and use carefully :)) ");
});

