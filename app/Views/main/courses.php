<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>


<?php if (!empty(session()->getFlashdata('fail'))) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
<?php endif ?>

<?php if (!empty(session()->getFlashdata('success'))) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif ?>

<!-- Courses Start -->
<?php foreach ($courses as $course) { ?>

    <div class="container-fluid pt-5">
        <div class="container">

            <div class="row" id="course-row">

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
                        <button class="round-6 m-3" name="get_level" value="<?= $course['course_id'] ?>">
                            Levels
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

<?php } ?>

<!-- Courses End -->


<?= $this->endSection() ?>