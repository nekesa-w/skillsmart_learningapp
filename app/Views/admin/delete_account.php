<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Delete Account</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="signup-form">

            <form action="<?= route_to('admin_delete_account'); ?>" method="POST" class="register-form" id="register-form">

                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <?php foreach ($details as $detail) { ?>

                    <p>User ID: <?= $detail['user_id'] ?></p>

                    <p>First Name: <?= $detail['first_name'] ?></p>
                    <p>Last Name: <?= $detail['last_name'] ?></p>
                    <p>Gender: <?= $detail['gender'] ?></p>
                    <p>Date of Birth: <?= $detail['dob'] ?></p>
                    <p>Email: <?= $detail['email'] ?></p>

                    <p>Are you sure you want to delete this account?</p>
                    <div class="form-group form-button">
                        <button type="submit" name="user_id" id="user_id" class="form-submit" value="<?= $detail['user_id'] ?>">
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