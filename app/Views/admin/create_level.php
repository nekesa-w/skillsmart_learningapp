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

      <form action="<?= route_to('admin_create_level'); ?>" method="POST" class="register-form" id="register-form">

        <?= csrf_field(); ?>
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>

        <div class="form-group">
          <label for="course_id">Pick Course</label>
          <select name="course_id" id="course_id" required>
            <?php foreach ($courses as $course) { ?>
              <option value="<?= $course['course_id'] ?>"><?= $course['course_title'] ?></option>
            <?php } ?>
          </select>
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'course_id') : '' ?></small>

        <div class="form-group">
          <label for="level_title"></label>
          <input type="text" name="level_title" id="level_title" placeholder="Level Title" value="<?= set_value('level_title') ?>" required />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'level_title') : '' ?></small>

        <div class="form-group">
          <label for="content"></label>
          <input type="text" name="content" id="content" placeholder="Level Content" value="<?= set_value('content') ?>" required />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'content') : '' ?></small>

        <div class="form-group">
          <label for="xp_requirement"></label>
          <input type="number" name="xp_requirement" id="xp_requirement" placeholder="XP Requirement" value="<?= set_value('xp_requirement') ?>" required />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'xp_requirement') : '' ?></small>

        <div class="form-group form-button">
          <input type="submit" name="signup" id="signup" class="form-submit" value="Create" />
        </div>

      </form>

    </div>

  </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>