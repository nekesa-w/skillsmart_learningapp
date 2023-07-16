<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Create Paragraphs</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<form action="<?= route_to('admin_create_paragraph'); ?>" method="POST">

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

			<div class="form-group">
				<label for="content"></label>
				<textarea rows="10" cols="50" name="content" id="content" value="<?= set_value('content') ?>" required>
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