// Set the target date and time for the countdown (e.g., June 30, 2023 12:00:00)
const targetDate = new Date('June 19, 2023 08:00:00').getTime();

// Update the countdown every second
const countdownInterval = setInterval(updateCountdown, 1000);

function updateCountdown() {
  // Get the current date and time
  const currentDate = new Date().getTime();

  // Calculate the time remaining until the target date
  const timeRemaining = targetDate - currentDate;

  // Calculate the days, hours, minutes, and seconds remaining
  const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
  const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

  // Display the updated countdown values
  document.getElementById('days').textContent = formatTime(days);
  document.getElementById('hours').textContent = formatTime(hours);
  document.getElementById('minutes').textContent = formatTime(minutes);
  document.getElementById('seconds').textContent = formatTime(seconds);

  // If the countdown is finished, clear the interval
  if (timeRemaining < 0) {
    clearInterval(countdownInterval);
  }
}

function formatTime(time) {
  // Add a leading zero if the time is less than 10
  return time < 10 ? `0${time}` : time;
}
