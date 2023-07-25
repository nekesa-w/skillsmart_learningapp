<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Delete Question</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="signup-form">

            <form action="<?= route_to('admin_delete_question'); ?>" method="POST" class="register-form" id="register-form">

                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <?php foreach ($questions as $question) { ?>

                    <p>Question ID: <?= $question['question_id'] ?></p>
                    <input type="hidden" name="level_id" id="level_id" value="<?= $question['level_id'] ?>">
                    <p>Level ID: <?= $question['level_id'] ?></p>
                    <p>Question Title: <?= $question['question_title'] ?></p>
                    <p>Question Paragraph: <?= $question['paragraph'] ?></p>
                    <p>Question Correct Answer: <?= $question['correct_answer'] ?></p>

                    <p>Are you sure you want to delete this question?</p>
                    <div class="form-group form-button">
                        <button type="submit" name="question_id" id="question_id" class="form-submit" value="<?= $question['question_id'] ?>">
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