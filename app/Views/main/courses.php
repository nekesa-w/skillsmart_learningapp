<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<?= csrf_field(); ?>
<?php if (!empty(session()->getFlashdata('fail'))) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
<?php endif ?>

<?php if (!empty(session()->getFlashdata('success'))) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif ?>

<!-- Courses Start -->

<div class="container-fluid pt-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-7">

                <?php foreach ($courses as $course) { ?>

                    <div class="col mb-5" id="course-row">
                        <div class="col text-center">
                            <p class="section-title m-3 px-5">
                                <span class="px-2"><?= $course['dimension'] ?> </span>
                            </p>
                            <h1 class="mb-4"><?= $course['course_title'] ?> </h1>
                        </div>

                        <div class="col">
                            <p class="m-0 m-3"><?= $course['desc'] ?></p>
                        </div>

                        <div class="col parent">
                            <form action="<?= route_to('getlevels'); ?>" method="POST">
                                <button class="btn-9 mb-5" name="get_level" value="<?= $course['course_id'] ?>">
                                    Go!
                                </button>
                            </form>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <div class="col ml-3">
                <div class="row mb-5" id="quest-row">

                    <?php if ($daily_xp_points >= 200) : ?>
                        <div class="my-3" id="header">
                            <h1>Daily Quest</h1>
                        </div>

                        <div class="row mb-3">

                            <div class="col ml-4 p-0">
                                <img class="quest-img" src="main/img/treasure-open.png" alt="Treasure Chest" />
                            </div>

                            <div class="col-8 m-0 p-0">
                                <h4 class="quest">Earn 200 XP</h4>

                                <h4 class="quest-complete"><i class="fa-solid fa-check"></i> Quest Completed</h4>
                            </div>

                        </div>
                    <?php else : ?>
                        <div class="my-3" id="header">
                            <h1>Daily Quest</h1>
                        </div>

                        <div class="row mb-3">

                            <div class="col ml-4 p-0">
                                <img class="quest-img" src="main/img/treasure-closed.png" alt="Treasure Chest" />
                            </div>

                            <div class="col-8 m-0 p-0">
                                <h4 class="quest">Earn 200 XP</h4>

                                <div class="progress-bar">
                                    <div class="progress"></div>
                                </div>
                                <h4 id="progress-text"></h4>
                            </div>

                        </div>
                    <?php endif ?>
                </div>

                <div class="row" id="leaderboardrow">
                    <div id="header">
                        <h1>Leaderboard</h1>
                    </div>

                    <div id="leaderboard">

                        <table>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>XP Points</th>
                            </tr>
                            <?php $rank = 1; ?>
                            <?php foreach ($leaderboard as $leader) : ?>
                                <tr>
                                    <td><?php echo $rank; ?></td>
                                    <td><?php echo $leader['first_name'] . ' ' . $leader['last_name']; ?></td>
                                    <td><?php echo $leader['xp_points']; ?></td>
                                </tr>
                                <?php $rank++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Courses End -->


<script>
    // Variable to hold the progress value
    var daily_current_xp = <?= $daily_xp_points ?>;

    var total_xp_goal = 200;

    var progressValue = (daily_current_xp / total_xp_goal) * 100;

    // Get the progress bar element
    var progressBar = document.querySelector('.progress');

    // Function to update the progress bar
    function updateProgressBar(value) {
        progressBar.style.width = value + '%';
        var progressText = document.getElementById("progress-text").innerHTML = value + '% complete';
    }

    // Example usage: Update the progress bar with a value of 50%
    updateProgressBar(progressValue);
</script>

<?= $this->endSection() ?>