document.addEventListener("DOMContentLoaded", function () {
  getUsers();
});

function getUsers() {
  var xhr = new XMLHttpRequest();
  var url = "../controller/action_adminUsers.php";

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById("table__content").innerHTML = xhr.responseText;
    }
  };

  xhr.send("search=" + "");
}

function hintUsers(keyword, isKeyUp) {
  var xhr = new XMLHttpRequest();
  var url = "../controller/action_adminUsers.php";
  var params = "search=" + keyword;

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById("table__content").innerHTML = xhr.responseText;
    }
  };

  xhr.send(params);

  if (!isKeyUp) {
    getUsers();
  }
}
