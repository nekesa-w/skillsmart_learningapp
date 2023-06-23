<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="registerlogin/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="registerlogin/css/style.css">
    <title>Login</title>
</head>

<body>

    <div class="main">

        <!-- Sign in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="registerlogin/images/signin-image.jpg" alt="sign up image"></figure>
                        <a href="<?= route_to('register'); ?>" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Email" />
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password" required>

                            </div>

                            <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>

                            <div class="form-group">
                                <input class="form-submit" type="submit" name="login" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </form>

    </div>
    </div>
    </div>
    </section>

    </div>

    <!-- JS -->
    <script src=" registerlogin/vendor/jquery/jquery.min.js"></script>
    <script src="registerlogin/js/main.js"></script>
</body>

</html>