<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Delete Course</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="signup-form">

            <form action="<?= route_to('admin_delete_course'); ?>" method="POST" class="register-form" id="register-form">

                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <?php foreach ($courses as $course) { ?>

                    <p>Course ID: <?= $course['course_id'] ?></p>

                    <p>Course Titl: <?= $course['course_title'] ?></p>
                    <p>Course Dimension: <?= $course['dimension'] ?></p>
                    <p>Course Desc: <?= $course['desc'] ?></p>
                    <p>Course Number of Levels: <?= $course['number_of_levels'] ?></p>

                    <p>Are you sure you want to delete this course?</p>
                    <div class="form-group form-button">
                        <button type="submit" name="course_id" id="course_id" class="form-submit" value="<?= $course['course_id'] ?>">
                            Delete
                        </button>
                    </div>
                <?php } ?>
            </form>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>