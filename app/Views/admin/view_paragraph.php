<?= $this->extend('layouts/adminlayout') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">View Paragraphs</h1>
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
			<h6 class="m-0 font-weight-bold text-primary">All Paragraphs</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Paragraph ID</th>
							<th>Level ID</th>
							<th>Content</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Paragraph ID</th>
							<th>Level ID</th>
							<th>Content</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</tfoot>
					<?php foreach ($paragraphs as $paragraph) { ?>
						<tbody>
							<tr>
								<td><?= $paragraph['paragraph_id'] ?></td>
								<td><?= $paragraph['level_id'] ?></td>
								<td><?= $paragraph['content'] ?></td>
								<td>
									<form action="<?= route_to('updateparagraphgetId'); ?>" method="POST">
										<button name="update_paragraph" value="<?= $paragraph['paragraph_id'] ?>">
											Edit
										</button>
									</form>
								</td>
								<td>
									<form action="<?= route_to('deleteparagraphgetId'); ?>" method="POST">
										<button name="delete_paragraph" value="<?= $paragraph['paragraph_id'] ?>">
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