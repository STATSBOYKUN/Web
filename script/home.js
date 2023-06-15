var testimonials = [
  {
    text:
      '“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nonne merninisti licere mihi ista probare, quae sunt a te dicta? Refert tamen, quo modo.”',
    name: 'Umaru',
  },
  {
    text:
      '“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nonne merninisti licere mihi ista probare, quae sunt a te dicta? Refert tamen, quo modo.”',
    name: 'Imika',
  },
  {
    text:
      '“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nonne merninisti licere mihi ista probare, quae sunt a te dicta? Refert tamen, quo modo.”',
    name: 'Kira',
  },
  {
    text:
      '“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nonne merninisti licere mihi ista probare, quae sunt a te dicta? Refert tamen, quo modo.”',
    name: 'Sara',
  },
  {
    text:
      '“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nonne merninisti licere mihi ista probare, quae sunt a te dicta? Refert tamen, quo modo.”',
    name: 'Kaori',
  },
  // Add more testimonial objects as needed
];

var currentIndex = 0; // Start with the first testimonial
var testimonialContainer = document.querySelector('.testimonial__items');

function next() {
  currentIndex++;
  if (currentIndex >= testimonials.length) {
    currentIndex = 0; // Wrap around to the first testimonial
  }
  updateTestimonial();
}

function prev() {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = testimonials.length - 1; // Wrap around to the last testimonial
  }
  updateTestimonial();
}

function updateTestimonial() {
  var currentTestimonial = testimonials[currentIndex];
  var textElementUmaru = testimonialContainer.querySelector('.umaru__text p');
  var nameElementUmaru = testimonialContainer.querySelector('.umaru__name p');
  var textElementImika = testimonialContainer.querySelector('.imika__text p');
  var nameElementImika = testimonialContainer.querySelector('.imika__name p');

  // Apply fade-out transition effect
  textElementUmaru.classList.add('fade-out');
  textElementImika.classList.add('fade-out');

  setTimeout(function () {
    // Update the text and name elements with the current testimonial values
    textElementUmaru.textContent = currentTestimonial.text;
    nameElementUmaru.textContent = currentTestimonial.name;

    // Determine the index of the corresponding testimonial for Imika
    var imikaIndex = currentIndex + 1;
    if (imikaIndex >= testimonials.length) {
      imikaIndex = 0; // Wrap around to the first testimonial
    }
    var imikaTestimonial = testimonials[imikaIndex];

    // Update the text and name elements for Imika
    textElementImika.textContent = imikaTestimonial.text;
    nameElementImika.textContent = imikaTestimonial.name;

    // Apply fade-in transition effect
    textElementUmaru.classList.add('fade-in');
    textElementImika.classList.add('fade-in');

    // Remove the fade-out class after the transition is completed
    setTimeout(function () {
      textElementUmaru.classList.remove('fade-out');
      textElementImika.classList.remove('fade-out');
    }, 300); // Adjust the transition duration (in milliseconds) to match your CSS transition time

    // Remove the fade-in class after the transition is completed
    setTimeout(function () {
      textElementUmaru.classList.remove('fade-in');
      textElementImika.classList.remove('fade-in');
    }, 600); // Adjust the transition duration (in milliseconds) to match your CSS transition time
  }, 300); // Adjust the delay before updating the text (in milliseconds) to match your CSS transition time
}


