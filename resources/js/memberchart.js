let data = "";

import Chart from 'chart.js/auto';

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true
    }
};

new Chart(
    document.getElementById('memberchart'),
    config
);
