// admin_ticket.js
document.addEventListener('DOMContentLoaded', function() {
  // Get all the dropdown buttons
  var dropdownButtons = document.querySelectorAll('.dropdown__button');

  // Attach event listeners to each dropdown button
  dropdownButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      // Get the dropdown content element for this button
      var dropdownContent = this.nextElementSibling;

      // Toggle the visibility of the dropdown content
      dropdownContent.classList.toggle('show');
    });
  });

  // Get all the dropdown items
  var dropdownItems = document.querySelectorAll('.dropdown__content p');

  // Attach event listeners to each dropdown item
  dropdownItems.forEach(function(item) {
    item.addEventListener('click', function() {
      // Get the selected status value
      var status = this.innerText;

      // Confirm the change with an alert
      var confirmMessage = 'Are you sure you want to change the status to ' + status + '?';
      var isConfirmed = confirm(confirmMessage);

      // If the change is confirmed, update the text of the dropdown button and apply the selected color
      if (isConfirmed) {
        // Get the dropdown button element
        var dropdownButton = this.parentNode.parentNode.querySelector('.dropdown__button');

        // Remove 'selected' class from all dropdown buttons
        dropdownButtons.forEach(function(button) {
          button.classList.remove('selected');
        });

        // Update the text of the dropdown button with the selected status
        dropdownButton.innerText = status;
        dropdownButton.classList.add('selected');

        // Add the selected color class based on the selected status
        if (status === 'Review') {
          dropdownButton.classList.add('review');
        } else if (status === 'Success') {
          dropdownButton.classList.add('success');
        } else if (status === 'Canceled') {
          dropdownButton.classList.add('canceled');
        }

        // Send an asynchronous request to update the status in the database
        var ticketId = dropdownButton.dataset.ticketId;
        updateStatus(ticketId, status);
      }

      // Close the dropdown by removing the 'show' class
      var dropdownContent = this.parentNode;
      dropdownContent.classList.remove('show');
    });
  });

  // Close the dropdown if the user clicks outside of it
  window.addEventListener('click', function(event) {
    if (!event.target.matches('.dropdown__button')) {
      var dropdownContents = document.querySelectorAll('.dropdown__content');
      dropdownContents.forEach(function(content) {
        if (content.classList.contains('show')) {
          content.classList.remove('show');
        }
      });
    }
  });

  // Function to send an asynchronous request to update the status in the database
  function updateStatus(ticketId, status) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controller/update_status.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Handle the response from the server if needed
      }
    };
    xhr.send('ticketId=' + ticketId + '&status=' + status);
  }
});
