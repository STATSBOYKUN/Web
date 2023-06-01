function updatePaymentDetails() {
  var numberOfTickets = parseInt(document.querySelector('.number__items input[type="number"]').value);
  var ticketPrice = 25000; // Price per ticket
  var taxAmount = 0; // Tax amount, assuming it's zero for this example
  var paymentCode = 11; // Payment code amount
  var totalAmount = ticketPrice * numberOfTickets + taxAmount + paymentCode;

  // Update the payment details in the HTML
  document.querySelector('.payments__info .p2').textContent = 'Rp ' + (ticketPrice * numberOfTickets).toLocaleString() + ',00';
  document.querySelector('.payments__title .p2').textContent = 'Rp ' + totalAmount.toLocaleString() + ',00';
}

function handleTicketChange(event) {
  updatePaymentDetails();
}

function handleSubmit(event) {
  event.preventDefault(); // Prevent form submission

  // Rest of the code...

  // Reset the form and number of tickets
  event.target.reset();
  document.querySelector('.number__items input[type="number"]').value = 1;
}

// Attach an event listener to the number of tickets input for real-time updates
document.querySelector('.number__items input[type="number"]').addEventListener('input', handleTicketChange);
