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


        <?php foreach ($questions as $question) { ?>
            <div class="row my-2">

                <form action="">
                    <div class="col question-page">

                        <h2>Question: </h2>
                        <h4><?= $question['question_title'] ?></h4>

                        <div class="row">
                            <div class="col radio-question">
                                <input type="radio" id="option-1" name="<?= $question['question_id'] ?>" value="<?= $question['option_1'] ?>">
                                <label for="option-1">1. <?= $question['option_1'] ?></label>
                            </div>

                            <div class="col radio-question">
                                <input type="radio" id="option-2" name="<?= $question['question_id'] ?>" value="<?= $question['option_2'] ?>">
                                <label for="option-2">2. <?= $question['option_2'] ?></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col radio-question">
                                <input type="radio" id="option-3" name="<?= $question['question_id'] ?>" value="<?= $question['option_3'] ?>">
                                <label for="option-3">3. <?= $question['option_3'] ?></label>
                            </div>

                            <div class="col radio-question">
                                <input type="radio" id="option-4" name="<?= $question['question_id'] ?>" value="<?= $question['option_4'] ?>">
                                <label for="option-4">4. <?= $question['option_4'] ?></label>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        <?php } ?>
        <!-- Pagination -->
        <div class="pagination justify-content-center mb-4">
            <?php if (!empty($pager)) :
                echo $pager->links('group1', 'bs_full');
            endif ?>

            <div class="btn-group pagination justify-content-center mb-4" role="group" aria-label="pager counts">
                &nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-light"><?= 'Page ' . $currentPage . ' of ' . $totalPages; ?></button>
            </div>
        </div>

        <!--  
        <form action="<?= route_to('markcomplete'); ?>" method="POST">

            <div class="text-center">
                <button class="btn btn-primary m-3 p-5" name="mark_complete" value="<?= $detail["level_id"] ?>">
                    Mark Complete
                </button>
            </div>

        </form>
        -->

    </div>
</div>
<!-- Level Content End -->



<?= $this->endSection() ?>