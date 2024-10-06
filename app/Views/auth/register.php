<?= $this->extend('layouts/registerloginlayout') ?>

<?= $this->section('content') ?>

<main>

	<!-- Sign up form -->
	<div class="container">
		<div class="auth-content">
			<div class="auth-form">
				<h2 class="form-title">Create an Account</h2>

				<form action="<?= route_to('save'); ?>" method="POST" class="auth-form" id="register-form">

					<?= csrf_field(); ?>
					<?php if (!empty(session()->getFlashdata('fail'))) : ?>
						<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
					<?php endif ?>

					<?php if (!empty(session()->getFlashdata('success'))) : ?>
						<div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
					<?php endif ?>

					<div class="form-group">
						<label for="first_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
						<input type="text" name="first_name" id="first_name" placeholder="First Name" value="<?= set_value('first_name') ?>" />
					</div>
					<small class="text-danger"><?= isset($validation) ? display_error($validation, 'first_name') : '' ?></small>

					<div class="form-group">
						<label for="last_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
						<input type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?= set_value('last_name') ?>" />
					</div>
					<small class="text-danger"><?= isset($validation) ? display_error($validation, 'last_name') : '' ?></small>

					<div class="form-group">

						<input class="form-gender" type="radio" name="gender" id="male" value="male" required>
						<label class=" label-gender" for="male">Male</label>

						<input class="form-gender" type="radio" name="gender" id="female" value="female" required>
						<label class="label-gender" for="female">Female</label>

					</div>

					<div class="form-group">
						<input type="date" name="dob" id="dob" placeholder="Date of Birth" value="<?= set_value('dob') ?>" />
					</div>
					<small class="text-danger"><?= isset($validation) ? display_error($validation, 'dob') : '' ?></small>


					<div class="form-group">
						<label for="email"><i class="zmdi zmdi-email"></i></label>
						<input type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>" />
					</div>
					<small class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></small>


					<div class="form-group">
						<label for="pass"><i class="zmdi zmdi-lock"></i></label>
						<input type="password" name="password" id="password" placeholder="Password" value="<?= set_value('password') ?>" />
					</div>
					<small class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></small>


					<div class="form-group">
						<label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
						<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" value="<?= set_value('confirmpassword') ?>" />
					</div>
					<small class="text-danger"><?= isset($validation) ? display_error($validation, 'confirmpassword') : '' ?></small>


					<div class="form-group form-button">
						<input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
					</div>
				</form>
			</div>

			<div class="signup-image">
				<div class="back-to-home">
					<a href="<?= base_url('index') ?>">Back to Home</a>
				</div>

				<figure><img src="<?php echo base_url('registerlogin/images/signup-image.jpg'); ?>" alt="register image"></figure>
				<a href="<?= base_url('login') ?>" class="signup-image-link">I already have an account</a>
			</div>
		</div>
	</div>

</main>

<?= $this->endSection() ?>