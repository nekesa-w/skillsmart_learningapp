<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">View Accounts</h1>
  </div>

  <?= csrf_field(); ?>
  <?php if (!empty(session()->getFlashdata('fail'))) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
  <?php endif ?>

  <?php if (!empty(session()->getFlashdata('success'))) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
  <?php endif ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>User ID</th>
              <th>First Name</th>
              <th>Last name</th>
              <th>Gender</th>
              <th>Date of Birth</th>
              <th>Email</th>
              <th>Status</th>
              <th>Activation Date</th>
              <th>XP Points</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>User ID</th>
              <th>First Name</th>
              <th>Last name</th>
              <th>Gender</th>
              <th>Date of Birth</th>
              <th>Email</th>
              <th>Status</th>
              <th>Activation Date</th>
              <th>XP Points</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </tfoot>
          <?php foreach ($users as $user) { ?>
            <tbody>
              <tr>
                <td><?= $user['user_id'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
                <td><?= $user['gender'] ?></td>
                <td><?= $user['dob'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['status'] ?></td>
                <td><?= $user['activation_date'] ?></td>
                <td><?= $user['xp_points'] ?></td>
                <td>
                  <form action="<?= route_to('updateusergetId'); ?>" method="POST">
                    <button name="update_user" value="<?= $user['user_id'] ?>">
                      Edit
                    </button>
                  </form>
                </td>
                <td>
                  <form action="<?= route_to('deleteusergetId'); ?>" method="POST">
                    <button name="delete_user" value="<?= $user['user_id'] ?>">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
            </tbody>
          <?php } ?>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>