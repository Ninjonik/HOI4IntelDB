import Chart from 'chart.js/auto';

if (!data) {
    let data = "";
}

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
