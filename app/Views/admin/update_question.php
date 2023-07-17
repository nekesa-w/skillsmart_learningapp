<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Question</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="signup-form">

            <form action="<?= route_to('admin_update_question'); ?>" method="POST" class="register-form" id="register-form">

                <?= csrf_field(); ?>
                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                <?php foreach ($questions as $question) { ?>
                    <p>Current Level: <?= $question['level_title'] ?></p>
                <?php } ?>

                <div class="form-group">
                    <label for="level_id">Pick Level</label><br>
                    <select name="level_id" id="level_id" required>
                        <?php foreach ($levels as $level) { ?>
                            <option value="<?= $level['level_id'] ?>"><?= $level['level_title'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <?php foreach ($questions as $question) { ?>
                    <p>Enter Paragraph</p>
                    <div class="form-group">
                        <label for="paragraph"></label>
                        <textarea rows="10" cols="50" name="paragraph" id="paragraph" value="<?= set_value('paragraph') ?>" required><?= $question['paragraph'] ?>
				        </textarea>
                    </div>

                    <p>Enter Question Title</p>
                    <div class="form-group">
                        <label for="question_title"></label>
                        <textarea rows="5" cols="50" name="question_title" id="question_title" value="<?= set_value('question_title') ?>" required><?= $question['question_title'] ?>
                        </textarea>
                    </div>

                    <p>Enter Correct Answer</p>
                    <div class="form-group">
                        <label for="correct_answer"></label>
                        <textarea rows="5" cols="50" name="correct_answer" id="correct_answer" value="<?= set_value('correct_answer') ?>" required><?= $question['correct_answer'] ?>
                    </textarea>
                    </div>

                    <p>Enter Option 1 </p>
                    <div class="form-group">
                        <label for="option_1"></label>
                        <textarea rows="5" cols="50" name="option_1" id="option_1" value="<?= set_value('option_1') ?>" required><?= $question['option_1'] ?>
				        </textarea>
                    </div>

                    <p>Enter Option 2</p>
                    <div class="form-group">
                        <label for="option_2"></label>
                        <textarea rows="5" cols="50" name="option_2" id="option_2" value="<?= set_value('option_2') ?>" required><?= $question['option_2'] ?>
				        </textarea>
                    </div>

                    <p>Enter Option 3</p>
                    <div class="form-group">
                        <label for="option_3"></label>
                        <textarea rows="5" cols="50" name="option_3" id="option_3" value="<?= set_value('option_3') ?>" required><?= $question['option_3'] ?>
				        </textarea>
                    </div>

                    <p>Enter Option 4</p>
                    <div class="form-group">
                        <label for="option_4"></label>
                        <textarea rows="5" cols="50" name="option_4" id="option_4" value="<?= set_value('option_4') ?>" required><?= $question['option_4'] ?>
				        </textarea>
                    </div>

                    <div class="form-group form-button">
                        <button type="submit" name="question_id" id="question_id" class="form-submit" value="<?= $question['question_id'] ?>">
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