function createChart(chartId, chartLabel, chartData) {
    const ctx = document.createElement('canvas');
    document.getElementById(chartId).appendChild(ctx);
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: chartLabel,
                data: chartData,
                fill: true,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.4,
                borderWidth: 2,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMin: 0,
                    suggestedMax: 100
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
}

// Create three charts with different data
createChart('bsb-chart-1', 'Chart 1 Data', [10, 20, 30, 40, 50, 60, 70]);
createChart('bsb-chart-2', 'Chart 2 Data', [65, 59, 80, 81, 56, 55, 40]);
createChart('bsb-chart-3', 'Chart 3 Data', [20, 40, 60, 80, 100, 120, 140]);