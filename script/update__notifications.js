const markAllAsReadLink = document.getElementById("markAllAsRead");
const notificationCards = document.querySelectorAll(".notification__body");
const notificationButton = document.querySelector(".notification__button");
const notificationPopup = document.getElementById("notificationPopup");

function update_notifications() {
  notificationCards.forEach(function (card) {
    card.style.background = "none";
  });
  alert("All notifications marked as read!");
  var xhr = new XMLHttpRequest();
  var url = "../controller/update_notifications.php";

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      alert("All notifications marked as read!");
    }
  };
  xhr.send("markAllAsRead=true");
}
