document.querySelector('form').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  var password = document.querySelector('.password__items input[type="password"]').value;
  var confirmPassword = document.querySelectorAll('.password__items input[type="password"]')[1].value;

  // Perform validation
  if (password.trim() === '') {
    alert('Please enter your password.');
    return;
  }

  if (confirmPassword.trim() === '') {
    alert('Please re-enter your password.');
    return;
  }

  if (password !== confirmPassword) {
    alert('Passwords do not match. Please re-enter your password.');
    return;
  }

  if (!isStrongPassword(password)) {
    alert(
      'Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one number, and one special character.'
    );
    return;
  }
  
  // If the validation passes, you can proceed with form submission or any other action
  alert('Password reset successfully!');
  // ... Your code here to reset the account or perform other actions
});

// Helper function to check password strength
function isStrongPassword(password) {
  // Use regular expressions to validate password strength
  var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+[{\]}\\|;:'",<.>/?]).{8,}$/;
  return passwordPattern.test(password);
}
