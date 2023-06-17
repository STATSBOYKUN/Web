document.querySelectorAll(".invoice-link").forEach(function (link) {
  link.addEventListener("click", function (e) {
    var invoiceURL = this.getAttribute("href");
    window.open(invoiceURL, "_blank");
  });
});
