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

                    <div class="col">
                        <h1 class="m-5"><?= $course['course_title'] ?></h1>
                    </div>

                    <?php if ($percent == 100) : ?>

                        <div class="col my-5">
                            <div class="progress-bar">
                                <div class="progress"></div>
                            </div>
                            <h3 id="progress-text"></h3>
                        </div>

                        <div class="col parent">
                            <form action="<?= route_to('getlevels'); ?>" method="POST">
                                <button class="round-6 m-3" name="get_level" value="<?= $course['course_id'] ?>" disabled>
                                    Quiz
                                </button>
                            </form>
                        </div>

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

                    <form action="<?= route_to('getcontent'); ?>" method="POST">

                        <button class="btn btn-primary m-3 p-5" name="get_content" value="<?= $cur['level_id'] ?>">
                            <?= $cur['level_title'] ?>
                        </button>

                    </form>

                </div>

            <?php } ?>

            <h1 class=>Locked Levels</h1>

            <?php if (empty($ongoing)) { ?>
                <h3 class="no-levels"> All Levels Completed!</h3>
            <?php } ?>

            <div class="row my-3">

                <?php foreach ($ongoing as $ong) { ?>

                    <form action="<?= route_to('getcontent'); ?>" method="POST">

                        <div class="sti_container">
                            <button class="btn-locked" disabled>
                                <span class="btn-locked-icon"> <i class="fa-solid fa-lock" aria-hidden="true"></i> </span>
                                <span class="btn-text">
                                    Complete Current Level to Unlock <?= $ong['level_title'] ?><br>
                                </span>
                            </button>
                        </div>

                    </form>

                <?php } ?>

            </div>

            <h1 class=>Completed Levels</h1>

            <?php if (empty($completed)) { ?>
                <h3 class="no-levels"> No Levels Completed!</h3>
            <?php } ?>

            <div class="row my-3">

                <?php foreach ($completed as $complete) { ?>

                    <form action="<?= route_to('getcontent'); ?>" method="POST">

                        <button class="btn btn-completed m-3 p-5" name="mark_complete" value="<?= $complete["level_id"] ?>">
                            <?= $complete["level_title"] ?>
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

    $.ajax({
        url: '<?php echo base_url("LevelController/levels"); ?>',
        method: 'POST',
        data: {
            courseprogress: progressValue
        },
        success: function(response) {
            // Handle the response from the controller method
            console.log(response);
        },
        error: function(xhr, status, error) {
            // Handle the error if the request fails
            console.error(xhr.responseText);
        }
    });
</script>

<?= $this->endSection() ?>