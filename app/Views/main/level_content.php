<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<?php foreach ($details as $detail) { ?>

    <!-- Level Content Start -->
    <div class="container-fluid pt-5">
        <div class="container">

            <div class="row my-5" id="course-row">

                <div class="col m-3">
                    <h1 class=><?= $detail['level_title'] ?></h1>
                </div>

            </div>

            <div class="row my-2">

                <p>
                    <?php foreach ($sentences as $sentence) {
                        echo $sentence . "<br>";
                    } ?>
                </p>

            </div>


            <form action="<?= route_to('markcomplete'); ?>" method="POST">

                <div class="text-center">
                    <button class="btn btn-primary m-3 p-5" name="mark_complete" value="<?= $detail["level_id"] ?>">
                        Mark Complete
                    </button>
                </div>

            </form>


        </div>
    </div>
    <!-- Level Content End -->

<?php } ?>

<?= $this->endSection() ?>