<?= $this->extend('layouts/registerloginlayout') ?>

<?= $this->section('content') ?>

<div class="main">

	<!-- Sign in  Form -->
	<div class="container">
		<div class="signup-content">

			<div class="signin-image">
				<div class="back-to-home">
					<a href="<?= base_url('index') ?>">Back to Home</a>
				</div>

				<figure><img src="<?php echo base_url('registerlogin/images/signin-image.jpg'); ?>" alt="sign up image"></figure>
				<a href="<?= route_to('login'); ?>" class="signup-image-link">Back to login</a>
			</div>

			<div class="signup-form">

				<?php if (!empty(session()->getFlashdata('fail'))) : ?>
					<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
				<?php endif ?>

				<?php if (!empty(session()->getFlashdata('success'))) : ?>
					<div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
				<?php endif ?>

				<h2 class="form-title">Forgot Password</h2>

				<form action="<?php echo base_url(); ?>LoginController/forgotpasswordAuth" method="POST" class="register-form" id="login-form">
					<p>Enter the email associated with your account to change your password.</p><br>
					<div class="form-group">
						<label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
						<input type="text" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>" required />
					</div>

					<div class="form-group">
						<input class="form-submit" type="submit" name="login" value="Find Account">
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>