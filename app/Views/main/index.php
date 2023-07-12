<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>


<!-- Header Start -->
<div class="container-fluid bg-primary p-5 px-0 px-md-5 mb-5">
    <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
            <h1 class="display-3 font-weight-bold text-white">
                Level Up Your Life Skills
            </h1>
            <p class="text-white mb-4">
                Embark on an epic quest of self-improvement. Harness the power of individualised feedback, conquer levels, master transformative courses, and earn prestigious badges on your path to greatness. Level up your life today!
            </p>
            <a href="<?= base_url('courses'); ?>" class="btn btn-secondary mt-1 py-3 px-5">Start Learning</a>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <img class="img-fluid mt-5" src="main/img/header.png" alt="gamification_header" />
        </div>
    </div>
</div>
<!-- Header End -->


<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid rounded mb-5 mb-lg-0" src="main/img/about-1.png" alt="" />
            </div>
            <div class="col-lg-7">
                <p class="section-title pr-5">
                    <span class="pr-2">About Life Skills Training</span>
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


<!-- 10 Core Life Skills Start -->
<div class="container-fluid pt-5">
    <div class="container pb-3">

        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">About Life Skills</span>
            </p>
            <h1 class="mb-4">The 10 Core Life Skills</h1>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Self-Awareness</h4>
                        <p class="m-0">
                            Understanding one's thoughts, emotions, and actions to develop personal growth and self-improvement.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Communication</h4>
                        <p class="m-0">
                            Ability to convey and exchange ideas, thoughts, and information effectively with others.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Resilience</h4>
                        <p class="m-0">
                            Capacity to bounce back, adapt, and recover from challenges, setbacks, and adversity.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Empathy</h4>
                        <p class="m-0">
                            Understanding and sharing the feelings and perspectives of others, fostering compassion and connection.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Participation</h4>
                        <p class="m-0">
                            Actively engaging and contributing in social, educational, or professional activities and endeavors.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Critical thinking</h4>
                        <p class="m-0">
                            Analyzing, evaluating, and applying logical and reasoned thinking to solve problems and make informed decisions.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Creativity</h4>
                        <p class="m-0">
                            Thinking innovatively, generating original ideas, and expressing oneself through various artistic and imaginative outlets.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Problem Solving</h4>
                        <p class="m-0">
                            Identifying, analyzing, and resolving challenges or obstacles by finding effective solutions.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Negotiation</h4>
                        <p class="m-0">
                            Engaging in constructive communication and compromise to reach mutually beneficial agreements or settlements.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Decision-making</h4>
                        <p class="m-0">
                            Assessing options, evaluating consequences, and making choices based on thoughtful consideration and judgment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  10 Core Life Skills End -->


<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container p-0">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">Testimonials</span>
            </p>
            <h1 class="mb-4">What Parents Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item px-3">
                <div class="bg-light shadow-sm rounded mb-4 p-4">
                    <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                    I'm impressed by how much SkillSmart engages my son. He's learning crucial life skills while enjoying every moment!
                </div>
                <div class="d-flex align-items-center">
                    <div class="pl-3">
                        <h5>John T.</h5>
                    </div>
                </div>
            </div>
            <div class="testimonial-item px-3">
                <div class="bg-light shadow-sm rounded mb-4 p-4">
                    <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                    SkillSmart is a game-changer! My daughter has gained valuable life skills in a fun and interactive way. Thank you!
                </div>
                <div class="d-flex align-items-center">
                    <div class="pl-3">
                        <h5>Jennifer M.</h5>
                    </div>
                </div>
            </div>
            <div class="testimonial-item px-3">
                <div class="bg-light shadow-sm rounded mb-4 p-4">
                    <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                    SkillSmart has transformed my child's learning experience. They're now effective communicators!
                </div>
                <div class="d-flex align-items-center">
                    <div class="pl-3">
                        <h5>Mark H.</h5>
                    </div>
                </div>
            </div>
            <div class="testimonial-item px-3">
                <div class="bg-light shadow-sm rounded mb-4 p-4">
                    <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                    My child loves SkillSmart! They've developed essential life skills while having a blast. Highly recommended!
                </div>
                <div class="d-flex align-items-center">
                    <div class="pl-3">
                        <h5>Sarah D.</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<?= $this->endSection() ?>