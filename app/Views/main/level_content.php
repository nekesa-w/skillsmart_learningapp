<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<!-- Levels Start -->
<div class="container-fluid pt-5">
    <div class="container">

        <div class="row" id="course-row">
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

        <div class="row my-3">

            <?php foreach ($levels as $level) { ?>
                <form action="<?= route_to('getcontent'); ?>" method="POST">
                    <button class="btn btn-primary m-3 p-5" name="get_content" value="<?= $level['level_id'] ?>">
                        Level: <?= $level['level_title'] ?>
                    </button>
                </form>
            <?php } ?>

        </div>

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