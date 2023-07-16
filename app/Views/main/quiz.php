<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<!-- Level Content Start -->
<div class="container-fluid pt-5">
    <div class="container">

        <div class="row my-5" id="course-row">

            <?php foreach ($level_details as $detail) { ?>
                <div class="col m-3">
                    <h1><?= $detail['level_title'] ?></h1>
                </div>

            <?php } ?>

        </div>

        <div class="row my-2">
            <form action="<?php echo base_url('submitanswers'); ?>" method="post">

                <?php foreach ($questions as $question) { ?>
                    <div class="col question-page">

                        <h2>Question: </h2>
                        <h4><?= $question['question_title'] ?></h4>

                        <input type="hidden" name="question_id" value="<?php echo $question['question_id']; ?>">

                        <div class="row">
                            <div class="col radio-question">
                                <input type="radio" id="option-1" name="answer" value="option_1">
                                <label for="option-1">1. <?= $question['option_1'] ?></label>
                            </div>

                            <div class="col radio-question">
                                <input type="radio" id="option-2" name="answer" value="option_2">
                                <label for="option-2">2. <?= $question['option_2'] ?></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col radio-question">
                                <input type="radio" id="option-3" name="ansanswerwer" value="option_3">
                                <label for="option-3">3. <?= $question['option_3'] ?></label>
                            </div>

                            <div class="col radio-question">
                                <input type="radio" id="option-4" name="answer" value="option_4">
                                <label for="option-4">4. <?= $question['option_4'] ?></label>
                            </div>
                        </div>

                    </div>
                <?php } ?>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary m-3 p-5">
                        Submit Answers
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>
<!-- Level Content End -->


<?= $this->endSection() ?>