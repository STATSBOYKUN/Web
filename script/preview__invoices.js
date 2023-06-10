// Add an event listener to all elements with the "invoice-link" class
document.querySelectorAll('.invoice-link').forEach(function(link) {
  link.addEventListener('click', function(e) {
    e.preventDefault(); // Prevent the default link behavior

    var invoiceURL = this.getAttribute('href');
    window.open(invoiceURL, '_blank');
  });
});
