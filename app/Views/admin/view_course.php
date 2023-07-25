<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Courses</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">All Courses</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Course ID</th>
                            <th>Course Title</th>
                            <th>Course Dimension</th>
                            <th>Description</th>
                            <th>Course Number of Levels</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Course ID</th>
                            <th>Course Title</th>
                            <th>Course Dimension</th>
                            <th>Description</th>
                            <th>Course Number of Levels</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <?php foreach ($courses as $course) { ?>
                        <tbody>
                            <tr>
                                <td><?= $course['course_id'] ?></td>
                                <td><?= $course['course_title'] ?></td>
                                <td><?= $course['dimension'] ?></td>
                                <td><?= $course['desc'] ?></td>
                                <td><?= $course['number_of_levels'] ?></td>
                                <td>
                                    <form action="<?= route_to('updatecoursegetId'); ?>" method="POST">
                                        <button name="update_course" value="<?= $course['course_id'] ?>">
                                            Edit
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?= route_to('deletecoursegetId'); ?>" method="POST">
                                        <button name="delete_course" value="<?= $course['course_id'] ?>">
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