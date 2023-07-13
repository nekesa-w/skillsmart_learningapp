<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Profile</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="<?= base_url('index'); ?>">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Profile</p>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Profile Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row">
            <?php foreach ($details as $detail) { ?>
                <div class="col-lg-4 mb-5">
                    <h2 class="mb-4">Your Details</h2>
                    <div class="d-flex">
                        <i class="fa-solid fa-user"></i>
                        <div class="pl-3">
                            <h5>First Name</h5>
                            <p><?= $detail['first_name'] ?> </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa-solid fa-user"></i>
                        <div class="pl-3">
                            <h5>Last Name</h5>
                            <p><?= $detail['last_name']  ?></p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa-solid fa-venus-mars"></i>
                        <div class="pl-2">
                            <h5>Gender</h5>
                            <p><?= $detail['gender'] ?> </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa-solid fa-cake-candles"></i>
                        <div class="pl-3">
                            <h5>Date of Birth</h5>
                            <p><?= $detail['dob'] ?> </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa-solid fa-at"></i>
                        <div class="pl-3">
                            <h5>Email</h5>
                            <p><?= $detail['email'] ?> </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div class="pl-3">
                            <h5>Account Activated</h5>
                            <p><?= $detail['activation_date'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <h2 class="mb-4">Your Points</h2>
                    <div class="d-flex">
                        <i class="fa-solid fa-star"></i>
                        <div class="pl-3">
                            <h5>Experience Points</h5>
                            <p><?= $detail['xp_points'] ?> XP</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-5">
                    <h2 class="mb-4">Your Earned Badges</h2>

                    <div class="medal-container">
                        <div class="medal">
                            <div class="medal-icon" data-medal="Gold"><span>Self-Awareness</span></div>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Contact End -->

<?= $this->endSection() ?>