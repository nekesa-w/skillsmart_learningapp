<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Delete Paragraph</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="signup-form">

            <form action="<?= route_to('admin_delete_paragraph'); ?>" method="POST" class="register-form" id="register-form">

                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <?php foreach ($paragraphs as $paragraph) { ?>

                    <p>Paragraph ID: <?= $paragraph['paragraph_id'] ?></p>
                    <p>Level ID: <?= $paragraph['level_id'] ?></p>
                    <p>Paragraph Content: <?= $paragraph['content'] ?></p>

                    <p>Are you sure you want to delete this paragraph?</p>
                    <div class="form-group form-button">
                        <button type="submit" name="paragraph_id" id="paragraph_id" class="form-submit" value="<?= $paragraph['paragraph_id'] ?>">
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