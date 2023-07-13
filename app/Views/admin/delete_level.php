<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Delete Level</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="signup-form">

            <form action="<?= route_to('admin_delete_level'); ?>" method="POST" class="register-form" id="register-form">

                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <?php foreach ($levels as $level) { ?>

                    <p>Level ID: <?= $level['level_id'] ?></p>
                    <p>Couse ID: <?= $level['course_id'] ?></p>
                    <p>Level Title: <?= $level['level_title'] ?></p>
                    <p>Level Content: <?= $level['content'] ?></p>
                    <p>Level XP Requirement: <?= $level['xp_requirement'] ?></p>

                    <p>Are you sure you want to delete this level?</p>
                    <div class="form-group form-button">
                        <button type="submit" name="level_id" id="level_id" class="form-submit" value="<?= $level['level_id'] ?>">
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