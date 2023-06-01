function validateForm() {
  var fullNameInput = document.querySelector('.name__items input[type="text"]');
  var fullName = fullNameInput.value.trim();
  var numberOfTicketsInput = document.querySelector(
    '.number__items input[type="number"]'
  );
  var numberOfTickets = parseInt(numberOfTicketsInput.value);
  var attachedFileInput = document.querySelector(
    '.file__items input[type="file"]'
  );
  var attachedFile = attachedFileInput.files[0];

  if (isNaN(numberOfTickets) || numberOfTickets <= 0) {
    alert("Please enter a valid number of tickets.");
    numberOfTicketsInput.focus();
    return false;
  }

  if (numberOfTickets > 5) {
    alert("Max tickets is 5");
    numberOfTicketsInput.focus();
    return false;
  }

  // ...

  // Validate file type
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  if (!allowedExtensions.exec(attachedFile.name)) {
    alert("Please attach an image file (jpg, jpeg, png, or gif).");
    attachedFileInput.focus();
    return false;
  }

  // Validate file size
  var maxSizeInBytes = 300000; // 300 KB
  if (attachedFile.size > maxSizeInBytes) {
    alert("Attached file size exceeds the limit of 300 KB.");
    attachedFileInput.focus();
    return false;
  }

  // ...

  return true;
}

function handleSubmit(event) {
  event.preventDefault(); // Prevent form submission

  if (!validateForm()) {
    return;
  }

  var fullName = document.querySelector(
    '.name__input input[type="text"]'
  ).value;
  var numberOfTickets = parseInt(
    document.querySelector('.number__items input[type="number"]').value
  );
  var attachedFile = document.querySelector('.file__items input[type="file"]')
    .files[0];

  // Reset the form and number of tickets
  event.target.reset();
  document.querySelector('.number__items input[type="number"]').value = 1;
  alert("Form submitted!");
}

document.querySelector("form").addEventListener("submit", handleSubmit);
