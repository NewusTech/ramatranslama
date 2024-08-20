<div>
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Layanan</h4>
                        </div>
                        <div class="card-body">
                            {{ $layanan->count('id') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-tags" aria-hidden="true"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jenis Layanan</h4>
                        </div>
                        <div class="card-body">
                            {{ $jenisLayanan->count('id') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Blog</h4>
                        </div>
                        <div class="card-body">
                            {{ $blogs->count('id') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pelanggan Count</h4>
                        </div>
                        <div class="card-body">
                            {{ $ListOrders->count('id') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart.js Diagram -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('dashboardChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar', // Tipe grafik: bar, line, pie, dll.
            data: {
                labels: ['Layanan', 'Jenis Layanan', 'Blog', 'Pelanggan Count'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        {{ $layanan->count('id') }},
                        {{ $jenisLayanan->count('id') }},
                        {{ $blogs->count('id') }},
                        {{ $ListOrders->count('id') }}
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
