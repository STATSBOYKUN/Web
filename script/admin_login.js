function handleSubmit(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  var username = document.querySelector('input[type="text"]').value;
  var password = document.querySelector('input[type="password"]').value;

  // Perform validation
  if (username.trim() === '') {
    alert('Please enter your username or email.');
    return;
  }

  // Validate email uniqueness and lowercase
  var lowercaseEmail = username.toLowerCase();
  if (isEmailTaken(lowercaseEmail)) {
    alert('This email is already taken. Please enter a unique email.');
    return;
  }

  if (lowercaseEmail !== username) {
    alert('Email must be lowercase.');
    return;
  }

  if (password.trim() === '') {
    alert('Please enter your password.');
    return;
  }

  // Validate password strength
  if (!isStrongPassword(password)) {
    alert(
      'Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one number, and one special character.'
    );
    return;
  }
}

// Helper function to check if email is taken (replace with your own implementation)
function isEmailTaken(email) {
  // Your code to check if the email is already taken
  // Return true if email is taken, false otherwise
  return false;
}

// Helper function to check password strength
function isStrongPassword(password) {
  // Use regular expressions to validate password strength
  var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+[{\]}\\|;:'",<.>/?]).{8,}$/;
  return passwordPattern.test(password);
}
