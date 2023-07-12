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

            <div class="row my-5" id="course-row">
                <?php foreach ($courses as $course) { ?>

                    <div class="col m-3">
                        <h1 class=><?= $course['course_title'] ?></h1>
                    </div>

                    <div class="col m-3">
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>

                        <h3 id="progress-text"></h3>
                    </div>
                <?php } ?>

            </div>

            <h1 class=>Ongoing Levels</h1>

            <?php if (empty($ongoing)) { ?>
                <h3 class="no-levels"> All Levels Completed!</h3>
            <?php } ?>

            <div class="row my-3">

                <?php foreach ($ongoing as $ong) { ?>

                    <form action="<?= route_to('getcontent'); ?>" method="POST">

                        <button class="btn btn-primary m-3 p-5" name="get_content" value="<?= $ong['level_id'] ?>">
                            Level: <?= $ong['level_title'] ?>
                        </button>

                    </form>

                <?php } ?>

            </div>

            <h1 class=>Completed Levels</h1>

            <div class="row my-3">

                <?php foreach ($completed as $complete) { ?>

                    <form action="<?= route_to('getcontent'); ?>" method="POST">

                        <button class="btn btn-primary m-3 p-5" name="get_content" value="<?= $complete["level_id"] ?>">
                            Level: <?= $complete["level_title"] ?>
                        </button>

                    </form>

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