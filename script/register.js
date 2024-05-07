document.addEventListener("DOMContentLoaded", function () {
  var userData = localStorage.getItem("user_data");
  if (userData) {
    userData = JSON.parse(userData);

    function setRadioButtonValue(radioName, value) {
      var radioButtons = document.getElementsByName(radioName);
      if (radioButtons.length > 0) {
        for (var i = 0; i < radioButtons.length; i++) {
          if (radioButtons[i].value === value) {
            radioButtons[i].checked = true;
            break;
          }
        }
      }
    }

    document.getElementById("email").value = userData.email || "";
    document.getElementById("username").value = userData.username || "";
    setRadioButtonValue("sex", userData.sex);
    document.getElementById("telephone").value = userData.telephone || "";
    document.getElementById("age").value = userData.age || "";
    document.getElementById("country").value = userData.country || "";
  }
});
