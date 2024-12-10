function createChart(chartId, chartLabel, chartData, colors) {
    const ctx = document.createElement('canvas');
    document.getElementById(chartId).appendChild(ctx);
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: chartLabel,
                data: chartData,
                fill: true,
                borderColor: colors.borderColor,
                backgroundColor: colors.backgroundColor,
                tension: 0.4,
                borderWidth: 2,
                pointBackgroundColor: colors.pointBackgroundColor,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMin: 0,
                    suggestedMax: 10
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

// Warna untuk grafik
const colors1 = {
    borderColor: 'rgba(144, 97, 249, 1)',
    backgroundColor: 'rgba(144, 97, 249, 0.2)',
    pointBackgroundColor: 'rgba(144, 97, 249, 1)'
};

const colors2 = {
    borderColor: 'rgba(54, 162, 235, 1)',
    backgroundColor: 'rgba(54, 162, 235, 0.2)',
    pointBackgroundColor: 'rgba(54, 162, 235, 1)'
};

const colors3 = {
    borderColor: 'rgba(75, 192, 192, 1)',
    backgroundColor: 'rgba(75, 192, 192, 0.2)',
    pointBackgroundColor: 'rgba(75, 192, 192, 1)'
};

// Fungsi untuk mengambil data menggunakan AJAX
async function fetchData() {
    try {
        const response = await fetch('./server/proses/GetStatistik.php');

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();
        console.log(data);

        // Mengisi datasets dengan data yang diterima
        createChart('bsb-chart-1', 'Regional', data.Regional, colors1);
        createChart('bsb-chart-2', 'Nasional', data.Nasional, colors2);
        createChart('bsb-chart-3', 'International', data.International, colors3);

    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

// Fungsi untuk membuat grafik
function createCharts() {
    createChart('bsb-chart-1', 'Regional', datasets['Regional'], colors1);
    createChart('bsb-chart-2', 'Nasional', datasets['Nasional'], colors2);
    createChart('bsb-chart-3', 'International', datasets['International'], colors3);
}

// Memanggil fetchData dan setelah selesai memanggil createCharts
fetchData()