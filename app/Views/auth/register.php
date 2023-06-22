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
		<section class="signup">
			<div class="container">
				<div class="signup-content">

					<div class="signup-form">
						<h2 class="form-title">Create an Account</h2>

						<form action="<?= base_url('auth/save'); ?>" method="POST" class="register-form" id="register-form">
							<?= csrf_field(); ?>

							<div class="form-group">
								<label for="first_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" name="first_name" id="first_name" placeholder="First Name" />
								<span class="text-danger"><?= isset($validation) ? display_error($validation, 'first_name') : '' ?></span>
							</div>

							<div class="form-group">
								<label for="last_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" name="last_name" id="last_name" placeholder="Last Name" />
							</div>

							<div class="form-group">

								<input class="form-gender" type="radio" name="gender" id="male" value="male">
								<label class="label-gender" for="male">Male</label>

								<input class="form-gender" type="radio" name="gender" id="female" value="female">
								<label class="label-gender" for="female">Female</label>

							</div>

							<div class="form-group">
								<input type="date" name="dob" id="dob" placeholder="Date of Birth" />
							</div>

							<div class="form-group">
								<label for="email"><i class="zmdi zmdi-email"></i></label>
								<input type="email" name="email" id="email" placeholder="Email" />
							</div>

							<div class="form-group">
								<label for="pass"><i class="zmdi zmdi-lock"></i></label>
								<input type="password" name="password" id="password" placeholder="Password" />
							</div>

							<div class="form-group">
								<label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
								<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm password" />
							</div>

							<div class="form-group form-button">
								<input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
							</div>
						</form>
					</div>

					<div class="signup-image">
						<figure><img src="registerlogin/images/signup-image.jpg" alt="register image"></figure>
						<a href="<?= site_url('auth/login') ?>" class="signup-image-link">I already have an account</a>
					</div>

				</div>
			</div>
		</section>

	</div>

	<!-- JS -->
	<script src="registerlogin/vendor/jquery/jquery.min.js"></script>
	<script src="registerlogin/js/main.js"></script>

</body>

</html>