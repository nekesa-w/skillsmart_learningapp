<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Account</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="signup-form">

      <form action="<?= route_to('admin_create_account'); ?>" method="POST" class="register-form" id="register-form">

        <?= csrf_field(); ?>
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>

        <div class="form-group">
          <label for="first_name"></label>
          <input type="text" name="first_name" id="first_name" placeholder="First Name" value="<?= set_value('first_name') ?>" />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'first_name') : '' ?></small>

        <div class="form-group">
          <label for="last_name"></label>
          <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?= set_value('last_name') ?>" />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'last_name') : '' ?></small>

        <div class="form-group">

          <input class="form-gender" type="radio" name="gender" id="male" value="male" required>
          <label class=" label-gender" for="male">Male</label>

          <input class="form-gender" type="radio" name="gender" id="female" value="female" required>
          <label class="label-gender" for="female">Female</label>

        </div>

        <div class="form-group">
          <input type="date" name="dob" id="dob" placeholder="Date of Birth" value="<?= set_value('dob') ?>" />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'dob') : '' ?></small>


        <div class="form-group">
          <label for="email"></label>
          <input type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>" />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></small>


        <div class="form-group">
          <label for="pass"></label>
          <input type="password" name="password" id="password" placeholder="Password" value="<?= set_value('password') ?>" />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></small>


        <div class="form-group">
          <label for="re-pass"></label>
          <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" value="<?= set_value('confirmpassword') ?>" />
        </div>
        <small class="text-danger"><?= isset($validation) ? display_error($validation, 'confirmpassword') : '' ?></small>


        <div class="form-group form-button">
          <input type="submit" name="signup" id="signup" class="form-submit" value="Create" />
        </div>

      </form>

    </div>

  </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>