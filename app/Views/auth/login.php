<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/0e4ad45b15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="registerlogin/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="registerlogin/css/style.css">
    <title>Login</title>
</head>


<body>

    <div class="main">

        <!-- Sign in  Form -->
        <div class="container">
            <div class="signup-content">

                <div class="signin-image">
                    <div class="back-to-home">
                        <a href="<?= base_url('index') ?>">Back to Home</a>
                    </div>

                    <figure><img src="registerlogin/images/signin-image.jpg" alt="sign up image"></figure>
                    <a href="<?= route_to('register'); ?>" class="signup-image-link">Create an account</a>
                </div>

                <div class="signup-form">

                    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                    <?php endif ?>

                    <?php if (!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                    <?php endif ?>

                    <h2 class="form-title">Login to Account</h2>

                    <form action="<?php echo base_url(); ?>LoginController/loginAuth" method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>" required />
                        </div>

                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="link forget-pass text-left"><a href="<?= base_url('forgotpassword') ?>">Forgot password?</a></div>

                        <div class="form-group">
                            <input class="form-submit" type="submit" name="login" value="Login">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src=" registerlogin/vendor/jquery/jquery.min.js"></script>
    <script src="registerlogin/js/main.js"></script>
</body>

</html>