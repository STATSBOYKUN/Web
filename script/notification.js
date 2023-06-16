const markAllAsReadLink = document.getElementById("markAllAsRead");
const notificationCards = document.querySelectorAll(".notification__body");
const notificationButton = document.querySelector(".notification__button");
const notificationPopup = document.getElementById("notificationPopup");

markAllAsReadLink.addEventListener("click", function (event) {
  // Iterate through all notification cards and update their background style
  notificationCards.forEach(function (card) {
    card.style.background = "none";
  });

  // Hide the popup after marking all as read
  notificationPopup.style.display = "none";

  // Send an AJAX request to update the read status in the database
  updateNotifications();
});

notificationButton.addEventListener("click", (event) => {
  event.stopPropagation(); // Prevent the click event from bubbling up to the document

  if (notificationPopup.style.display === "block") {
    // If popup is already shown, hide it
    notificationPopup.style.display = "none";
  } else {
    // If popup is hidden, show it
    notificationPopup.style.display = "block";
  }
});

// Hide the popup when the user clicks outside of it
document.addEventListener("click", (event) => {
  if (
    !notificationButton.contains(event.target) &&
    !notificationPopup.contains(event.target) &&
    !notificationCards.contains(event.target)
  ) {
    notificationPopup.style.display = "none";
  }
});

function updateNotifications() {
  var xhr = new XMLHttpRequest();
  var url = "../controller/update_notifications.php";

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log(xhr.responseText);
      alert("All notifications marked as read!");
    }
  };
  xhr.send("markAllAsRead=true");
}
