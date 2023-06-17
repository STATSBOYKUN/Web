document.addEventListener("DOMContentLoaded", function () {
  const profileButton = document.getElementById("profile");
  const profileImage = document.getElementById("profile__img");
  const profilePopup = document.getElementById("profile__items");

  profileButton.addEventListener("click", (event) => {
    if (profilePopup.style.display === "block") {
      profilePopup.style.display = "none";
      profileImage.style.background = "#ffeed9";
    } else {
      profilePopup.style.display = "block";
      profileImage.style.background = "#4e5e80";
    }
  });

  document.addEventListener("click", (event) => {
    if (
      !profileButton.contains(event.target) &&
      !profilePopup.contains(event.target)
    ) {
      profilePopup.style.display = "none";
      profileImage.style.background = "#ffeed9";
    }
  });

  var storedImageSource = localStorage.getItem("randomImageSource");

  if (storedImageSource) {
    document.getElementById("profile__img").src = storedImageSource;
  } else {
    var imageSources = [
      "../assets/Icons/avatars/Asset 1.svg",
      "../assets/Icons/avatars/Asset 2.svg",
      "../assets/Icons/avatars/Asset 3.svg",
      "../assets/Icons/avatars/Asset 4.svg",
      "../assets/Icons/avatars/Asset 5.svg",
      "../assets/Icons/avatars/Asset 6.svg",
      "../assets/Icons/avatars/Asset 7.svg",
      "../assets/Icons/avatars/Asset 8.svg",
      "../assets/Icons/avatars/Asset 9.svg",
      "../assets/Icons/avatars/Asset 10.svg",
      "../assets/Icons/avatars/Asset 11.svg",
      "../assets/Icons/avatars/Asset 12.svg",
      "../assets/Icons/avatars/Asset 13.svg",
      "../assets/Icons/avatars/Asset 14.svg",
      "../assets/Icons/avatars/Asset 15.svg",
      "../assets/Icons/avatars/Asset 16.svg",
    ];

    var randomIndex = Math.floor(Math.random() * imageSources.length);
    var randomImageSource = imageSources[randomIndex];

    document.getElementById("profile__img").src = randomImageSource;

    localStorage.setItem("randomImageSource", randomImageSource);
  }
});
