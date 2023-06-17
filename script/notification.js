const markAllAsReadLink = document.getElementById("markAllAsRead");
const notificationCards = document.querySelectorAll(".notification__body");
const notificationButton = document.querySelector(".notification__button");
const notificationPopup = document.getElementById("notificationPopup");

markAllAsReadLink.addEventListener("click", function (event) {
  notificationCards.forEach(function (card) {
    card.style.background = "none";
  });

  notificationPopup.style.display = "none";

  updateNotifications();
});

notificationButton.addEventListener("click", (event) => {
  if (notificationPopup.style.display === "block") {
    notificationPopup.style.display = "none";
  } else {
    notificationPopup.style.display = "block";
  }
});

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
