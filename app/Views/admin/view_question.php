<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Questions</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">All Questions</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Question ID</th>
                            <th>Level ID</th>
                            <th>Paragraph</th>
                            <th>Question Title</th>
                            <th>Correct Answer</th>
                            <th>Option 1</th>
                            <th>Option 2</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Question ID</th>
                            <th>Level ID</th>
                            <th>Paragraph</th>
                            <th>Question Title</th>
                            <th>Correct Answer</th>
                            <th>Option 1</th>
                            <th>Option 2</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <?php foreach ($questions as $question) { ?>
                        <tbody>
                            <tr>
                                <td><?= $question['question_id'] ?></td>
                                <td><?= $question['level_id'] ?></td>
                                <td><?= $question['paragraph'] ?></td>
                                <td><?= $question['question_title'] ?></td>
                                <td><?= $question['correct_answer'] ?></td>
                                <td><?= $question['option_1'] ?></td>
                                <td><?= $question['option_2'] ?></td>
                                <td><?= $question['option_3'] ?></td>
                                <td><?= $question['option_4'] ?></td>
                                <td>
                                    <form action="<?= route_to('updatequestiongetId'); ?>" method="POST">
                                        <button name="update_question" value="<?= $question['question_id'] ?>">
                                            Edit
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?= route_to('deletequestiongetId'); ?>" method="POST">
                                        <button name="delete_question" value="<?= $question['question_id'] ?>">
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