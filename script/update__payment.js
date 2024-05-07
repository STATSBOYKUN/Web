function updatePaymentDetails() {
  var ticketPrice = 25000;
  var taxAmount = 0;
  var paymentCode = 11;
  var numberOfTickets = parseInt(document.querySelector('.number__items input[type="number"]').value);

  var totalAmount = ticketPrice * numberOfTickets + taxAmount + paymentCode;

  document.querySelector('.payments__info .p2').textContent = 'Rp ' + (ticketPrice * numberOfTickets).toLocaleString() + ',00';
  document.querySelector('.payments__title .p2').textContent = 'Rp ' + totalAmount.toLocaleString() + ',00';
}

function handleTicketChange(event) {
  updatePaymentDetails();
}

function handleSubmit(event) {
  event.target.reset();
  document.querySelector('.number__items input[type="number"]').value = 1;
}

document.querySelector('.number__items input[type="number"]').addEventListener('input', handleTicketChange);
