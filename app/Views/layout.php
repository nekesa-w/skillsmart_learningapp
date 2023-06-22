<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- header templates-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="header/fonts/icomoon/style.css">
    <link rel="stylesheet" href="header/css/owl.carousel.min.css">
    <link rel="stylesheet" href="header/css/bootstrap.min.css">
    <link rel="stylesheet" href="header/css/style.css">

    <!-- footer templates-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="footer/fonts/icomoon/style.css">
    <link rel="stylesheet" href="footer/css/bootstrap.min.css">
    <link rel="stylesheet" href="footer/css/style.css">

    <title>My Layout</title>
</head>


<body>
    <!-- header -->

    <header class="site-navbar" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="index.php" class="text-white mb-0">Brand</a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="active"><a href="index.php"><span>Home</span></a></li>
                            <li class="has-children">
                                <a href="about.html"><span>Dropdown</span></a>
                                <ul class="dropdown arrow-top">
                                    <li><a href="#">Menu One</a></li>
                                    <li><a href="#">Menu Two</a></li>
                                    <li><a href="#">Menu Three</a></li>
                                    <li class="has-children">
                                        <a href="#">Dropdown</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Menu One</a></li>
                                            <li><a href="#">Menu Two</a></li>
                                            <li><a href="#">Menu Three</a></li>
                                            <li><a href="#">Menu Four</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="listings.html"><span>Listings</span></a></li>
                            <li><a href="about.html"><span>About</span></a></li>
                            <li><a href="blog.html"><span>Blog</span></a></li>
                            <li><a href="contact.html"><span>Contact</span></a></li>
                        </ul>
                    </nav>
                </div>


                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

            </div>

        </div>
        </div>

    </header>


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


<script src="header/js/jquery-3.3.1.min.js"></script>
<script src="header/js/popper.min.js"></script>
<script src="header/js/bootstrap.min.js"></script>
<script src="header/js/jquery.sticky.js"></script>
<script src="header/js/main.js"></script>

<script src="footer/js/jquery-3.3.1.min.js"></script>
<script src="footer/js/popper.min.js"></script>
<script src="footer/js/bootstrap.min.js"></script>

</html>