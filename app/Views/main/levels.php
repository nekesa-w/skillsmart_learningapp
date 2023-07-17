<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<!-- Levels Start -->
<div class="container-fluid pt-5">
    <div class="container">

        <?php if (empty($levels)) : ?>
            <div class="row my-5" id="course-row">
                <?php foreach ($courses as $course) { ?>

                    <div class="col m-3">
                        <h1 class=><?= $course['course_title'] ?></h1>
                    </div>

                <?php } ?>

            </div>

            <h3 class="no-levels"> No Levels!</h3>

        <?php else : ?>

            <div class="row my-4 align-items-center" id="course-row">
                <?php foreach ($courses as $course) { ?>

                    <div class="col-lg-5 parent">
                        <p class="section-title m-3 px-5">
                            <span class="px-2">Course </span>
                        </p>
                        <h1><?= $course['course_title'] ?></h1>
                    </div>

                    <?php if ($percent == 100) : ?>

                        <?php if ($quizcompleted == 1) : ?>
                            <div class="col parent">
                                <p class="section-title m-3 px-5">
                                    <span class="px-2">Levels </span>
                                </p>
                                <div class="progress-bar">
                                    <div class="progress"></div>
                                </div>
                                <h3 id="progress-text"></h3>
                            </div>

                            <?php foreach ($details as $detail) { ?>
                                <div class="col parent">
                                    <button class="round-6 m-3" disabled>
                                        <i class="fa-solid fa-crosshairs"></i>
                                        <span class="ribbon">Score: <?= $detail['percentage'] ?>%</span>
                                    </button>
                                    <h4 class="completed">Challenge <br> Completed!</h4>
                                </div>
                            <?php } ?>

                        <?php else : ?>
                            <div class="col parent">
                                <p class="section-title m-3 px-5">
                                    <span class="px-2">Levels </span>
                                </p>
                                <div class="progress-bar">
                                    <div class="progress"></div>
                                </div>
                                <h3 id="progress-text"></h3>
                            </div>

                            <div class="col parent">
                                <form action="<?= route_to('getchallenge'); ?>" method="POST">
                                    <button class="round-6 m-3" name="getchallenge" value="<?= $course['course_id'] ?>">
                                        <i class="fa-solid fa-crosshairs"></i>
                                        <span class="ribbon">Go to Challenge</span>
                                    </button>
                                </form>
                            </div>
                        <?php endif ?>
                    <?php else : ?>

                        <div class="col m-5">
                            <div class="progress-bar">
                                <div class="progress"></div>
                            </div>

                            <h3 id="progress-text"></h3>
                        </div>

                    <?php endif ?>

                <?php } ?>

            </div>

            <h1 class=>Current Level</h1>

            <?php if (empty($current)) { ?>
                <h3 class="no-levels"> All Levels Completed!</h3>
            <?php } ?>

            <?php foreach ($current as $cur) { ?>

                <div class="row my-3">
                    <div class="icon-button">
                        <form action="<?= route_to('getcontent'); ?>" method="POST">

                            <button class="btn btn-current" name="get_content" value="<?= $cur['level_id'] ?>">
                                <i class="fa-solid fa-star"></i>
                                <?= $cur['level_title'] ?>
                            </button>

                        </form>
                    </div>
                </div>

            <?php } ?>

            <h1 class=>Locked Levels</h1>

            <?php if (empty($ongoing)) { ?>
                <h3 class="no-levels"> All Levels Completed!</h3>
            <?php } ?>

            <div class="row my-3">

                <?php foreach ($ongoing as $ong) { ?>
                    <div class="icon-button">

                        <button class="btn btn-locked" disabled>
                            <i class="fa-solid fa-lock"></i>
                            Complete Current Level to Unlock <?= $ong['level_title'] ?>
                        </button>

                    </div>
                <?php } ?>

            </div>

            <h1 class=>Completed Levels</h1>

            <?php if (empty($completed)) { ?>
                <h3 class="no-levels"> No Levels Completed!</h3>
            <?php } ?>

            <div class="row my-3">

                <?php foreach ($completed as $complete) { ?>
                    <div class="icon-button">
                        <form action="<?= route_to('getcontent'); ?>" method="POST">

                            <button class="btn btn-completed" name="get_content" value="<?= $complete["level_id"] ?>">
                                <i class="fa-solid fa-crown"></i>
                                <?= $complete["level_title"] ?>
                            </button>

                        </form>
                    </div>
                <?php } ?>

            </div>
        <?php endif ?>

    </div>
</div>
<!-- Levels End -->


<script>
    // Variable to hold the progress value
    var complete_lvl = <?= $progress ?>;

    <?php foreach ($courses as $course) { ?>
        var total_lvl = <?= $course['number_of_levels']  ?>;
    <?php } ?>

    var progressValue = (complete_lvl / total_lvl) * 100;

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