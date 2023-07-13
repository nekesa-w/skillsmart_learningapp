<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Course</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="signup-form">

            <form action="<?= route_to('admin_update_course'); ?>" method="POST" class="register-form" id="register-form">

                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <?php foreach ($courses as $course) { ?>
                    <div class="form-group">
                        <label for="course_title"></label>
                        <input type="text" name="course_title" id="course_title" value="<?= $course['course_title'] ?>" />
                    </div>
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'course_title') : '' ?></small>

                    <div class="form-group">
                        <label for="dimension"></label>
                        <input type="text" name="dimension" id="dimension" value="<?= $course['dimension'] ?>" />
                    </div>
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'dimension') : '' ?></small>

                    <div class="form-group">
                        <label for="desc"></label>
                        <input type="text" name="desc" id="desc" value="<?= $course['desc'] ?>" />
                    </div>
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'desc') : '' ?></small>

                    <div class="form-group form-button">
                        <button type="submit" name="course_id" id="course_id" class="form-submit" value="<?= $course['course_id'] ?>">
                            Update
                        </button>
                    </div>
                <?php } ?>

            </form>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>