import './bootstrap';

function sinceBeginning() {
  new Chart(document.getElementById('sinceBeginning'), {
    type: 'line',
    data: {
      datasets: [
        {
          label: '# Since beginning',
          data: true,
        },
      ],
      labels: ''
    },
  });
}

window.sinceBeginning = sinceBeginning;