var testimonials = [
  {
    text: "“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nonne merninisti licere mihi ista probare, quae sunt a te dicta? Refert tamen, quo modo.”",
    name: "Umaru",
  },
  {
    text: "“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nonne merninisti licere mihi ista probare, quae sunt a te dicta? Refert tamen, quo modo.”",
    name: "Imika",
  },
  {
    text: "“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nonne merninisti licere mihi ista probare, quae sunt a te dicta? Refert tamen, quo modo.”",
    name: "Kira",
  },
  {
    text: "“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nonne merninisti licere mihi ista probare, quae sunt a te dicta? Refert tamen, quo modo.”",
    name: "Sara",
  },
  {
    text: "“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nonne merninisti licere mihi ista probare, quae sunt a te dicta? Refert tamen, quo modo.”",
    name: "Kaori",
  },
];

var currentIndex = 0;
var testimonialContainer = document.querySelector(".testimonial__items");

function next() {
  currentIndex++;
  if (currentIndex >= testimonials.length) {
    currentIndex = 0;
  }
  updateTestimonial();
}

function prev() {
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = testimonials.length - 1;
  }
  updateTestimonial();
}

function updateTestimonial() {
  var currentTestimonial = testimonials[currentIndex];
  var textElementUmaru = testimonialContainer.querySelector(".umaru__text p");
  var nameElementUmaru = testimonialContainer.querySelector(".umaru__name p");
  var textElementImika = testimonialContainer.querySelector(".imika__text p");
  var nameElementImika = testimonialContainer.querySelector(".imika__name p");

  textElementUmaru.classList.add("fade-out");
  textElementImika.classList.add("fade-out");

  setTimeout(function () {
    textElementUmaru.textContent = currentTestimonial.text;
    nameElementUmaru.textContent = currentTestimonial.name;

    var imikaIndex = currentIndex + 1;
    if (imikaIndex >= testimonials.length) {
      imikaIndex = 0;
    }
    var imikaTestimonial = testimonials[imikaIndex];

    textElementImika.textContent = imikaTestimonial.text;
    nameElementImika.textContent = imikaTestimonial.name;

    textElementUmaru.classList.add("fade-in");
    textElementImika.classList.add("fade-in");

    setTimeout(function () {
      textElementUmaru.classList.remove("fade-out");
      textElementImika.classList.remove("fade-out");
    }, 300);

    setTimeout(function () {
      textElementUmaru.classList.remove("fade-in");
      textElementImika.classList.remove("fade-in");
    }, 600);
  }, 300);
}
