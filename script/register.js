function handleSubmit(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  var email = document.querySelector('input[type="email"]').value;
  var username = document.querySelector('input[type="text"]').value.toLowerCase();
  var sex = document.querySelector('input[name="sex"]:checked');
  var age = document.querySelector('input[type="number"]').value;
  var country = document.getElementById('country').value;
  var telephoneNumber = document.querySelector('.signtelephone__input input[type="text"]').value;
  var password = document.querySelector('.password__items input[type="password"]').value;
  var confirmPassword = document.querySelectorAll('.password__items input[type="password"]')[1].value;

  // Perform validation
  if (email.trim() === '') {
    alert('Please enter your email.');
    return;
  }

  // Validate email uniqueness and lowercase
  var lowercaseEmail = email.toLowerCase();
  if (isEmailTaken(lowercaseEmail)) {
    alert('This email is already taken. Please enter a unique email.');
    return;
  }

  if (lowercaseEmail !== email) {
    alert('Email must be lowercase.');
    return;
  }

  if (username.trim() === '') {
    alert('Please enter your username.');
    return;
  }

  if (username !== username.toLowerCase()) {
    alert('Username must be lowercase.');
    return;
  }

  if (!sex) {
    alert('Please select your sex.');
    return;
  }

  if (sex.value === 'male' && document.querySelector('input[name="sex"][value="female"]').checked) {
    alert('You cannot select both male and female options for sex.');
    return;
  }

  if (sex.value === 'female' && document.querySelector('input[name="sex"][value="male"]').checked) {
    alert('You cannot select both male and female options for sex.');
    return;
  }

  if (age < 18) {
    alert('You must be at least 18 years old to sign up.');
    return;
  }

  if (telephoneNumber.trim() === '') {
    alert('Please enter your telephone number.');
    return;
  }

  if (!isTelephoneValid(telephoneNumber)) {
    alert('Telephone number must be a 10-digit number.');
    return;
  }

  if (password.trim() === '') {
    alert('Please enter your password.');
    return;
  }

  if (password !== confirmPassword) {
    alert('Passwords do not match. Please re-enter your password.');
    return;
  }

  // Validate password strength
  if (!isStrongPassword(password)) {
    alert(
      'Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one number, and one special character.'
    );
    return;
  }

  // If the validation passes, you can proceed with form submission or any other action
  alert('Form submitted successfully!');
  // ... Your code here to submit the form or perform other actions
}

// Helper function to check if email is taken (replace with your own implementation)
function isEmailTaken(email) {
  // Your code to check if the email is already taken
  // Return true if email is taken, false otherwise
  return false;
}

// Helper function to check if telephone number is valid
function isTelephoneValid(telephone) {
  const telephoneRegex = /^\d{10}$/;
  return telephoneRegex.test(telephone);
}

// Helper function to check password strength
function isStrongPassword(password) {
  // Use regular expressions to validate password strength
  var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  return passwordPattern.test(password);
}
