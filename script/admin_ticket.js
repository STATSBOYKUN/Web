const dropdownBtn = document.querySelector(".dropdown__button");
const dropdownContent = document.querySelector(".dropdown__content");

dropdownBtn.addEventListener("click", function() {
  dropdownContent.classList.toggle("show");
});

window.addEventListener("click", function(event) {
  if (!event.target.matches(".dropdown__button")) {
    if (dropdownContent.classList.contains("show")) {
      dropdownContent.classList.remove("show");
    }
  }
});
