<section class="leaderboard-rank-section">
    <div class="leaderboard-rank-container">
        <div class="leaderboard-rank-grid">
            <div class="leaderboard-rank-card leaderboard-rank-first">
                <div href="#" class="leaderboard-rank-link leaderboard-rank-link-blue font-regular">
                    <svg class="leaderboard-rank-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z" />
                    </svg>
                    Tutorial
                </div>
                <h1 class="leaderboard-rank-title font-semi-bold">Tentang <span>Katalis</span></h1>
                <p class="leaderboard-rank-text font-regular">Here's some additional content</p>
                <div id="bsb-chart-2"></div>
            </div>
            <div class="leaderboard-rank-card leaderboard-rank-first">
                <div href="#" class="leaderboard-rank-link leaderboard-rank-link-blue font-regular">
                    <svg class="leaderboard-rank-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z" />
                    </svg>
                    Tutorial
                </div>
                <h1 class="leaderboard-rank-title font-semi-bold">Tentang <span>Katalis</span></h1>
                <p class="leaderboard-rank-text font-regular">Here's some additional content</p>
                <div id="bsb-chart-2"></div>
            </div>
            <div class="leaderboard-rank-card leaderboard-rank-first">
                <div href="#" class="leaderboard-rank-link leaderboard-rank-link-blue font-regular">
                    <svg class="leaderboard-rank-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z" />
                    </svg>
                    Tutorial
                </div>
                <h1 class="leaderboard-rank-title font-semi-bold">Tentang <span>Katalis</span></h1>
                <p class="leaderboard-rank-text font-regular">Here's some additional content</p>
                <div id="bsb-chart-3"></div>
            </div>
        </div>
    </div>
</section>

<script>
    const ctx = document.getElementById('leaderboardChart').getContext('2d');
    const leaderboardChart = new Chart(ctx, {
        type: 'bar', // Chart type, e.g., bar, line, pie
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets: [{
                label: 'Monthly Data',
                data: [10, 20, 30, 40, 50], // Sample data
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>