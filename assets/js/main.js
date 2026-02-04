// main.js - EstatePro Interactions
document.addEventListener('DOMContentLoaded', function () {

    // 1. Initialize Revenue Chart (Bar Chart)
    const ctx = document.getElementById('revenueChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Monthly Revenue ($)',
                    data: [12000, 15000, 11000, 18000, 22000, 24000],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    }

    // 2. Sidebar Active State Toggle
    const currentPath = window.location.pathname;
    document.querySelectorAll('.btn-outline').forEach(link => {
        if (link.getAttribute('href').includes(currentPath)) {
            link.style.background = 'hsl(var(--primary))';
            link.style.color = 'white';
        }
    });
});