const targetDate = new Date('June 19, 2023 08:00:00').getTime();

const countdownInterval = setInterval(updateCountdown, 1000);

function updateCountdown() {
  const currentDate = new Date().getTime();

  const timeRemaining = targetDate - currentDate;

  const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
  const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

  document.getElementById('days').textContent = formatTime(days);
  document.getElementById('hours').textContent = formatTime(hours);
  document.getElementById('minutes').textContent = formatTime(minutes);
  document.getElementById('seconds').textContent = formatTime(seconds);

  if (timeRemaining < 0) {
    clearInterval(countdownInterval);
  }
}

function formatTime(time) {
  return time < 10 ? `0${time}` : time;
}


function handleScrollAnimation() {
  const fadeElements = document.querySelectorAll('.fade-in');
  fadeElements.forEach((element) => {
    const elementTop = element.getBoundingClientRect().top;
    const elementBottom = element.getBoundingClientRect().bottom;
    const isVisible = elementTop < window.innerHeight && elementBottom >= 0;
    if (isVisible) {
      element.classList.add('fade-in-show');
    } else {
      element.classList.remove('fade-in-show');
    }
  });
}

window.addEventListener('scroll', handleScrollAnimation);
handleScrollAnimation();