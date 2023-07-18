<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <?= csrf_field(); ?>
    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>

    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                Total Accounts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $users ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                Total Courses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $courses ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-book"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                Total Levels</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $levels ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                Total Questions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $questions ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-question"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-7 col-lg-6">
            <!-- Gender Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Gender Distribution</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="genderChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-7 col-lg-6">
            <!-- Xp Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Daily XP Points Distribution By User Age</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="xpChartCanvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-7 col-lg-6">
            <!-- Quiz by Course Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Average Quiz Percentage By Course</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="averageQuizPercentageChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-7 col-lg-6">
            <!-- Levels by User Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> XP Points Per Course</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie">
                        <canvas id="xpChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- gender_chart.php -->

<script>
    // gender chart
    // gender chart
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    var genderCounts = <?= json_encode($genderCounts); ?>;
    var genders = [];
    var counts = [];
    var backgroundColors = [];

    genderCounts.forEach(function(item) {
        genders.push(item.gender);
        counts.push(item.count);

        // Assign blue color for males and pink color for females
        if (item.gender === 'male') {
            backgroundColors.push('rgba(54, 162, 235, 0.5)'); // Blue color
        } else if (item.gender === 'female') {
            backgroundColors.push('rgba(255, 99, 132, 0.5)'); // Pink color
        }
    });

    var ctx = document.getElementById('genderChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: genders,
            datasets: [{
                label: 'Gender',
                data: counts,
                backgroundColor: backgroundColors
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        precision: 0
                    }
                }]
            }
        }
    });



    // xp points by age chart
    var ctx = document.getElementById('xpChartCanvas').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($ages) ?>,
            datasets: [{
                label: 'XP Points',
                data: <?= json_encode($xpPoints) ?>,
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Age'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'XP Points'
                    }
                }
            }
        }
    });

    // avergae percentage by course
    var averagePercentages = <?php echo json_encode($averagePercentages); ?>;

    var labels = Object.keys(averagePercentages);
    var data = Object.values(averagePercentages);

    var ctx = document.getElementById('averageQuizPercentageChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Average Quiz Percentage',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        max: 100,
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }]
            }
        }
    });

    //xp points per course
    var ctx = document.getElementById('xpChart').getContext('2d');

    var chartData = <?php echo json_encode($chartData); ?>;

    var data = [];
    var labels = [];

    chartData.forEach(function(item) {
        data.push(item.value);
        labels.push(item.label);
    });

    var chartConfig = {
        type: 'pie',
        data: {
            datasets: [{
                data: data,
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    // Add more colors if needed
                ],
            }],
            labels: labels,
        },
        options: {
            responsive: true,
        },
    };

    var myPieChart = new Chart(ctx, chartConfig);
</script>

<?= $this->endSection() ?>