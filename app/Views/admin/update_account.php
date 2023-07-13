<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Account</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="signup-form">

            <form action="<?= route_to('admin_update_account'); ?>" method="POST" class="register-form" id="register-form">

                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <?php foreach ($details as $detail) { ?>

                    <p>User ID: <?= $detail['user_id'] ?></p>
                    <div class="form-group">
                        <label for="first_name"></label>
                        <input type="text" name="first_name" id="first_name" value="<?= $detail['first_name'] ?>" required />
                    </div>
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'first_name') : '' ?></small>

                    <div class="form-group">
                        <label for="last_name"></label>
                        <input type="text" name="last_name" id="last_name" value="<?= $detail['last_name'] ?>" required />
                    </div>
                    <small class="text-danger"><?= isset($validation) ? display_error($validation, 'last_name') : '' ?></small>

                    <p>Gender: <?= $detail['gender'] ?></p>
                    <div class="form-group">

                        <input class="form-gender" type="radio" name="gender" id="male" value="male" required>
                        <label class=" label-gender" for="male">Male</label>

                        <input class="form-gender" type="radio" name="gender" id="female" value="female" required>
                        <label class="label-gender" for="female">Female</label>

                    </div>

                    <div class="form-group form-button">
                        <button type="submit" name="user_id" id="user_id" class="form-submit" value="<?= $detail['user_id'] ?>">
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