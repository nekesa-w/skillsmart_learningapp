<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Create Questions</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<form action="<?= route_to('admin_create_question'); ?>" method="POST">

			<?= csrf_field(); ?>
			<?php if (!empty(session()->getFlashdata('fail'))) : ?>
				<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
			<?php endif ?>

			<?php if (!empty(session()->getFlashdata('success'))) : ?>
				<div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
			<?php endif ?>

			<div class="form-group">
				<label for="level_id">Pick Level</label><br>
				<select name="level_id" id="level_id" required>
					<?php foreach ($levels as $level) { ?>
						<option value="<?= $level['level_id'] ?>"><?= $level['level_title'] ?></option>
					<?php } ?>
				</select>
			</div>
			<small class="text-danger"><?= isset($validation) ? display_error($validation, 'level_id') : '' ?></small>

			<p>Enter Paragraph</p>
			<div class="form-group">
				<label for="paragraph"></label>
				<textarea rows="10" cols="50" name="paragraph" id="paragraph" value="<?= set_value('paragraph') ?>" required>
				</textarea>
			</div>
			<small class="text-danger"><?= isset($validation) ? display_error($validation, 'paragraph') : '' ?></small>

			<p>Enter Question Title</p>
			<div class="form-group">
				<label for="question_title"></label>
				<textarea rows="5" cols="50" name="question_title" id="question_title" value="<?= set_value('question_title') ?>" required>
				</textarea>
			</div>
			<small class="text-danger"><?= isset($validation) ? display_error($validation, 'question_title') : '' ?></small>

			<p>Enter Correct Answer</p>
			<div class="form-group">
				<label for="correct_answer"></label>
				<textarea rows="5" cols="50" name="correct_answer" id="correct_answer" value="<?= set_value('correct_answer') ?>" required>
				</textarea>
			</div>
			<small class="text-danger"><?= isset($validation) ? display_error($validation, 'content') : '' ?></small>

			<p>Enter Option 1 </p>
			<div class="form-group">
				<label for="option_1"></label>
				<textarea rows="5" cols="50" name="option_1" id="option_1" value="<?= set_value('option_1') ?>" required>
				</textarea>
			</div>
			<small class="text-danger"><?= isset($validation) ? display_error($validation, 'option_1') : '' ?></small>

			<p>Enter Option 2</p>
			<div class="form-group">
				<label for="option_2"></label>
				<textarea rows="5" cols="50" name="option_2" id="option_2" value="<?= set_value('option_2') ?>" required>
				</textarea>
			</div>
			<small class="text-danger"><?= isset($validation) ? display_error($validation, 'option_2') : '' ?></small>

			<p>Enter Option 3</p>
			<div class="form-group">
				<label for="option_3"></label>
				<textarea rows="5" cols="50" name="option_3" id="option_3" value="<?= set_value('option_3') ?>" required>
				</textarea>
			</div>
			<small class="text-danger"><?= isset($validation) ? display_error($validation, 'option_3') : '' ?></small>

			<p>Enter Option 4</p>
			<div class="form-group">
				<label for="option_4"></label>
				<textarea rows="5" cols="50" name="option_4" id="option_4" value="<?= set_value('option_4') ?>" required>
				</textarea>
			</div>
			<small class="text-danger"><?= isset($validation) ? display_error($validation, 'content') : '' ?></small>

			<div class="form-group form-button">
				<input type="submit" name="signup" id="signup" class="form-submit" value="Create" />
			</div>

		</form>

	</div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>