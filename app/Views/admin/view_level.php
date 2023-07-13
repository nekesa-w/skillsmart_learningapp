<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Levels</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Levels</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Level ID</th>
                            <th>Course ID</th>
                            <th>Level Title</th>
                            <th>Content</th>
                            <th>XP Requirement</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Level ID</th>
                            <th>Course ID</th>
                            <th>Level Title</th>
                            <th>Content</th>
                            <th>XP Requirement</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <?php foreach ($levels as $level) { ?>
                        <tbody>
                            <tr>
                                <td><?= $level['level_id'] ?></td>
                                <td><?= $level['course_id'] ?></td>
                                <td><?= $level['level_title'] ?></td>
                                <td><?= $level['content'] ?></td>
                                <td><?= $level['xp_requirement'] ?></td>
                                <td>
                                    <form action="<?= route_to('update_level'); ?>" method="POST">
                                        <button name="update_level" value="<?= $level['level_id'] ?>">
                                            Edit
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?= route_to('delete_level'); ?>" method="POST">
                                        <button name="delete_level" value="<?= $level['level_id'] ?>">
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