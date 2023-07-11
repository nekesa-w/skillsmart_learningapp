<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">About Us</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="<?= base_url('index'); ?>">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">About Us</p>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 align-self-start">
                <img class="img-fluid rounded mb-5" src="main/img/about-1.png" alt="" />
            </div>
            <div class="col-lg-7">
                <p class="section-title pr-5">
                    <span class="pr-2">About Life Skills Training</span>
                </p>

                <h1 class="mb-4">Why SkillSmart?</h1>
                <p>
                    SkillSmart is the ultimate gamified learning web app designed to empower children with essential life skills. Our interactive platform offers engaging activities, practical lessons, and personalized progress tracking. Join us on a journey of growth and success!
                </p>
                <p>
                    Unlike traditional training methods, SkillSmart offers a dynamic and engaging platform that captivates children's attention and keeps them motivated throughout their learning journey. With interactive levels, personalized challenges, and real-time feedback, SkillSmart provides a practical and immersive learning experience that bridges the gap between theory and practice.
                </p>
                <p>
                    Our app empowers children to actively apply and refine their skills in a fun and interactive environment, boosting their confidence, adaptability, and problem-solving abilities. Join SkillSmart today and unlock the full potential of your child's life skills development!
                </p>

                <h1 class="mb-4">Why learn life skills?</h1>
                <p>
                    At SkillSmart, we specialize in teaching life skills to children through interactive games and activities. We prioritize engaging experiences, practical knowledge, and personal growth, empowering children for success in the real world.
                </p>

                <div class="row pt-2 pb-4">
                    <div class="col-6 col-md-4">
                        <img class="img-fluid rounded" src="main/img/about-2.png" alt="" />
                    </div>
                    <div class="col-6 col-md-8">
                        <ul class="list-inline m-0">
                            <li class="py-2 border-top border-bottom">
                                <i class="fa fa-check text-primary mr-3"></i> Skills for successful transition to adulthood
                            </li>
                            <li class="py-2 border-bottom">
                                <i class="fa fa-check text-primary mr-3"></i> Track achievements and boost confidence
                            </li>
                            <li class="py-2 border-bottom">
                                <i class="fa fa-check text-primary mr-3"></i> Fun-filled learning experience
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<?= $this->endSection() ?>