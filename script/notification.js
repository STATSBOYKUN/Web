document.addEventListener("DOMContentLoaded", function () {
  const markAllAsReadLink = document.getElementById("markAllAsRead");
  const notificationCard = document.querySelector(".notification__body");
  const notificationButton = document.querySelector('.notification__button');
  const notificationPopup = document.getElementById('notificationPopup');

  markAllAsReadLink.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default link behavior
    notificationCard.style.background = "#ffeed9";
    // Add your code here to mark all notifications as read

    // Hide the popup after marking all as read
    notificationPopup.style.display = 'none';
  });

  notificationButton.addEventListener('click', (event) => {
    event.stopPropagation(); // Prevent the click event from bubbling up to the document

    if (notificationPopup.style.display === 'block') {
      // If popup is already shown, hide it
      notificationPopup.style.display = 'none';
    } else {
      // If popup is hidden, show it
      notificationPopup.style.display = 'block';
    }
  });

  // Hide the popup when the user clicks outside of it
  document.addEventListener('click', (event) => {
    if (!notificationButton.contains(event.target) && !notificationPopup.contains(event.target)) {
      notificationPopup.style.display = 'none';
    }
  });
});
