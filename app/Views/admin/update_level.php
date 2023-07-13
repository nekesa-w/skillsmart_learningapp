<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Level</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="signup-form">

            <form action="<?= route_to('admin_update_level'); ?>" method="POST" class="register-form" id="register-form">

                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <?php foreach ($levels as $level) { ?>
                    <p>Current Course: <?= $level['course_title'] ?></p>
                <?php } ?>

                <div class="form-group">
                    <label for="course_id">Pick Course</label>
                    <select name="course_id" id="course_id" required>
                        <?php foreach ($courses as $course) { ?>
                            <option value="<?= $course['course_id'] ?>"><?= $course['course_title'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <small class="text-danger"><?= isset($validation) ? display_error($validation, 'course_id') : '' ?></small>


                <?php foreach ($levels as $level) { ?>
                    <div class="form-group">
                        <label for="level_title"></label>
                        <input type="text" name="level_title" id="level_title" value="<?= $level['level_title'] ?>" required />
                    </div>
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'level_title') : '' ?></small>

                    <div class="form-group">
                        <label for="content"></label>
                        <input type="text" name="content" id="content" value="<?= $level['content'] ?>" required />
                    </div>
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'content') : '' ?></small>

                    <div class="form-group">
                        <label for="xp_requirement"></label>
                        <input type="number" name="xp_requirement" id="xp_requirement" value="<?= $level['xp_requirement'] ?>" required />
                    </div>
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'xp_requirement') : '' ?></small>

                    <div class="form-group form-button">
                        <button type="submit" name="level_id" id="level_id" class="form-submit" value="<?= $level['level_id'] ?>">
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