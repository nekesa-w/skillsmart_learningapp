<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="registerlogin/fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="registerlogin/css/style.css">
	<title>Register</title>
</head>

<body>

	<div class="main">

		<!-- Sign up form -->
		<div class="container">
			<div class="signup-content">
				<div class="signup-form">
					<h2 class="form-title">Create an Account</h2>

					<form action="<?= route_to('save'); ?>" method="POST" class="register-form" id="register-form">

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
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'first_name') : '' ?></span>

						<div class="form-group">
							<label for="last_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
							<input type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?= set_value('last_name') ?>" />
						</div>
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'last_name') : '' ?></span>

						<div class="form-group">

							<input class="form-gender" type="radio" name="gender" id="male" value="<?= set_value('male') ?>">
							<label class=" label-gender" for="male">Male</label>

							<input class="form-gender" type="radio" name="gender" id="female" value="<?= set_value('female') ?>">
							<label class="label-gender" for="female">Female</label>

						</div>
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'gender') : '' ?></span>

						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'gender') : '' ?></span>


						<div class="form-group">
							<input type="date" name="dob" id="dob" placeholder="Date of Birth" value="<?= set_value('dob') ?>" />
						</div>
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'dob') : '' ?></span>


						<div class="form-group">
							<label for="email"><i class="zmdi zmdi-email"></i></label>
							<input type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>" />
						</div>
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>


						<div class="form-group">
							<label for="pass"><i class="zmdi zmdi-lock"></i></label>
							<input type="password" name="password" id="password" placeholder="Password" value="<?= set_value('password') ?>" />
						</div>
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>


						<div class="form-group">
							<label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
							<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" value="<?= set_value('confirmpassword') ?>" />
						</div>
						<span class="text-danger"><?= isset($validation) ? display_error($validation, 'confirmpassword') : '' ?></span>


						<div class="form-group form-button">
							<input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
						</div>
					</form>
				</div>

				<div class="signup-image">
					<figure><img src="registerlogin/images/signup-image.jpg" alt="register image"></figure>
					<a href="<?= base_url('login') ?>" class="signup-image-link">I already have an account</a>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="registerlogin/vendor/jquery/jquery.min.js"></script>
	<script src="registerlogin/js/main.js"></script>

</body>

</html>