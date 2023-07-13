<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Course</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="signup-form">

      <form action="<?= route_to('admin_create_course'); ?>" method="POST" class="register-form" id="register-form">

        <?= csrf_field(); ?>
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>

        <div class="form-group">
          <label for="course_title"></label>
          <input type="text" name="course_title" id="course_title" placeholder="Course Title" value="<?= set_value('course_title') ?>" />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'course_title') : '' ?></small>

        <div class="form-group">
          <label for="dimension"></label>
          <input type="text" name="dimension" id="dimension" placeholder="Course Dimension" value="<?= set_value('dimension') ?>" />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'dimension') : '' ?></small>

        <div class="form-group">
          <label for="desc"></label>
          <input type="text" name="desc" id="desc" placeholder="Course Description" value="<?= set_value('desc') ?>" />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'desc') : '' ?></small>

        <div class="form-group form-button">
          <input type="submit" name="signup" id="signup" class="form-submit" value="Create" />
        </div>

      </form>

    </div>

  </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>