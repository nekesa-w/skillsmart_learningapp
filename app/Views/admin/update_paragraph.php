<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Paragraphs</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <form action="<?= route_to('admin_update_paragraph'); ?>" method="POST">

            <?= csrf_field(); ?>
            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>

            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
            <?php endif ?>

            <?php foreach ($paragraphs as $paragraph) { ?>
                <p>Current Level: <?= $paragraph['level_title'] ?></p>
            <?php } ?>

            <div class="form-group">
                <label for="level_id">Pick Level</label><br>
                <select name="level_id" id="level_id" required>
                    <?php foreach ($levels as $level) { ?>
                        <option value="<?= $level['level_id'] ?>"><?= $level['level_title'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <small class="text-danger"><?= isset($validation) ? display_error($validation, 'paragraph_id') : '' ?></small>

            <?php foreach ($paragraphs as $paragraph) { ?>
                <div class="form-group">
                    <label for="content"></label>

                    <textarea rows="10" cols="50" name="content" id="content" value="<?= set_value('content') ?>" required>
                    <?= $paragraph['content'] ?>
				</textarea>

                </div>
                <small class="text-danger"><?= isset($validation) ? display_error($validation, 'content') : '' ?></small>

                <div class="form-group form-button">
                    <button type="submit" name="paragraph_id" id="paragraph_id" class="form-submit" value="<?= $paragraph['paragraph_id'] ?>">
                        Update
                    </button>
                </div>
            <?php } ?>
        </form>

    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>