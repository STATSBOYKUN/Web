document.addEventListener("DOMContentLoaded", function () {
  const profileButton = document.getElementById('profile');
  const profileImage = document.getElementById('profile__img');
  const profilePopup = document.getElementById('profile__items');

  profileButton.addEventListener('click', (event) => {
    event.stopPropagation(); // Prevent the click event from bubbling up to the document

    if (profilePopup.style.display === 'block') {
      // If popup is already shown, hide it
      profilePopup.style.display = 'none';
      profileImage.style.background = "#ffeed9";
    } else {
      // If popup is hidden, show it
      profilePopup.style.display = 'block';
      profileImage.style.background = "#4e5e80";
    }
  });

  // Hide the popup when the user clicks outside of it
  document.addEventListener('click', (event) => {
    if (!profileButton.contains(event.target) && !profilePopup.contains(event.target)) {
      profilePopup.style.display = 'none';
      profileImage.style.background = "#ffeed9";
    }
  });

  // Check if the image source is already stored in local storage
  var storedImageSource = localStorage.getItem("randomImageSource");

  if (storedImageSource) {
    // If the image source is already stored, use it
    document.getElementById("profile__img").src = storedImageSource;
  } else {
    // Array of possible image sources
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
      "../assets/Icons/avatars/Asset 16.svg"
    ];

    // Randomly select an image source
    var randomIndex = Math.floor(Math.random() * imageSources.length);
    var randomImageSource = imageSources[randomIndex];

    // Set the selected image source to the <img> element
    document.getElementById("profile__img").src = randomImageSource;

    // Store the selected image source in local storage
    localStorage.setItem("randomImageSource", randomImageSource);
  }
});
