<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- header templates-->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="header/css/style.css">

    <!-- footer templates-->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="footer/fonts/icomoon/style.css">
    <link rel="stylesheet" href="footer/css/bootstrap.min.css">
    <link rel="stylesheet" href="footer/css/style.css">

    <title>My Layout</title>
</head>


<body>
    <!-- header -->

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">skillsmart</a>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Page</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">Page 1</a>
                            <a class="dropdown-item" href="#">Page 2</a>
                            <a class="dropdown-item" href="#">Page 3</a>
                            <a class="dropdown-item" href="#">Page 4</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Menu</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                    <li class="nav-item cta"><a href="#" class="nav-link">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- dynamic part of page -->
    <?= $this->renderSection('content') ?>


    <!-- footer -->
    <footer class="footer-95942">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-6 col-md mb-4 mb-md-0">
                            <h3>Discover</h3>
                            <ul class="list-unstyled nav-links">
                                <li><a href="#">Website editors</a></li>
                                <li><a href="#">Online retail</a></li>
                                <li><a href="#">Get started</a></li>
                                <li><a href="#">Services</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md mb-4 mb-md-0">
                            <h3>About</h3>
                            <ul class="list-unstyled nav-links">
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Team</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md mb-4 mb-md-0">
                            <h3>Services</h3>
                            <ul class="list-unstyled nav-links">
                                <li><a href="#">Events</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Awards</a></li>

                            </ul>
                        </div>
                        <div class="col-sm-6 col-md mb-4 mb-md-0">
                            <h3>Buy</h3>
                            <ul class="list-unstyled nav-links">
                                <li><a href="#">Where to Buy</a></li>
                                <li><a href="#">Shop Online</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md mb-4 mb-md-0">
                            <h3>Help</h3>
                            <ul class="list-unstyled nav-links">
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Knowledge Base</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-md-12 pb-3">
                    <div class="border-top">

                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-4">
                    <ul class="list-unstyled social mb-0 pb-0 nav-left">
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <span class="small">Colorlib &copy; All Rights Reserved.</span>
                </div>
                <div class="col-md-4 text-right">
                    <ul class="list-unstyled social app mb-0 pb-0 nav-right">
                        <li><a href="#"><span class="icon-apple mr-3"></span> App Store</a></li>
                        <li><a href="#"><span class="icon-play mr-3"></span> Google Store</a></li>
                    </ul>
                </div>
            </div>
        </div>

        </div>
    </footer>

</body>

<script src="header/js/jquery.min.js"></script>
<script src="header/js/popper.js"></script>
<script src="header/js/bootstrap.min.js"></script>
<script src="header/js/main.js"></script>

<script src="footer/js/jquery-3.3.1.min.js"></script>
<script src="footer/js/popper.min.js"></script>
<script src="footer/js/bootstrap.min.js"></script>

</html>