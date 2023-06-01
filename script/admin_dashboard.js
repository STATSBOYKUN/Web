// Scatter Plot - Visitors
const visitorData = [
  { date: '2023-05-26', count: 50 },
  { date: '2023-05-27', count: 70 },
  { date: '2023-05-28', count: 30 },
  { date: '2023-05-29', count: 90 },
  { date: '2023-05-30', count: 120 },
  { date: '2023-05-31', count: 80 },
  { date: '2023-06-01', count: 110 }
];

const visitorsTodayElement = document.getElementById('visitorsToday');
const visitorsTotalElement = document.getElementById('visitorsTotal');

const visitorDates = visitorData.map(data => data.date);
const visitorCounts = visitorData.map(data => data.count);

const visitorsChart = new Chart(document.getElementById('visitorsChart'), {
  type: 'line',
  data: {
    labels: visitorDates,
    datasets: [{
      label: 'Visitors',
      data: visitorCounts,
      backgroundColor: 'rgba(33, 150, 243, 0.4)',
      borderColor: 'rgba(33, 150, 243, 1)',
      borderWidth: 2
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      x: {
        type: 'time',
        time: {
          unit: 'day',
          displayFormats: {
            day: 'MMM D'
          }
        }
      },
      y: {
        beginAtZero: true
      }
    }
  }
});

visitorsTodayElement.textContent = visitorCounts[visitorCounts.length - 1];
visitorsTotalElement.textContent = visitorCounts.reduce((total, count) => total + count, 0);

// Progress Circle - Tickets Sold
const ticketsSold = 80;
const ticketsTotal = 100;

const ticketsSoldElement = document.getElementById('ticketsSold');

const ticketsSoldPercentage = (ticketsSold / ticketsTotal) * 100;

const ticketsChart = new Chart(document.getElementById('ticketsChart'), {
  type: 'doughnut',
  data: {
    labels: ['Sold', 'Remaining'],
    datasets: [{
      data: [ticketsSold, ticketsTotal - ticketsSold],
      backgroundColor: ['#2196f3', '#e0e0e0']
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    cutout: '70%',
    plugins: {
      tooltip: {
        enabled: false
      },
      legend: {
        display: false
      }
    }
  }
});

ticketsSoldElement.textContent = ticketsSold;

// Progress Circle - Users
const usersSold = 80;
const usersTotal = 100;

const usersSoldElement = document.getElementById('usersSold');

const usersSoldPercentage = (usersSold / usersTotal) * 100;

const usersChart = new Chart(document.getElementById('usersChart'), {
  type: 'doughnut',
  data: {
    labels: ['Sold', 'Remaining'],
    datasets: [{
      data: [usersSold, usersTotal - usersSold],
      backgroundColor: ['#2196f3', '#e0e0e0']
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    cutout: '70%',
    plugins: {
      tooltip: {
        enabled: false
      },
      legend: {
        display: false
      }
    }
  }
});

usersSoldElement.textContent = usersSold;
