<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<!-- Level Content Start -->
<div class="container-fluid pt-5">
    <div class="container">

        <div class="row my-5" id="course-row">

            <?php foreach ($level_details as $detail) { ?>
                <div class="col m-3">
                    <h1 class="level-heading"><?= $detail['level_title'] ?></h1>
                </div>

            <?php } ?>

        </div>

        <div class="row my-2">

            <?php foreach ($questions as $question) { ?>

                <p class="content-level"><?= $question['paragraph'] ?></p>

            <?php } ?>
        </div>

        <div class="row my-2">

            <?php foreach ($questions as $question) { ?>
                <div class="col mb-3">

                    <div class="row justify-content-center">
                        <h3 class="level-heading mb-5">Question: <?= $question['question_title'] ?></h3>

                        <?php
                        $isCorrect = session()->get('isCorrect' . $question['question_id']);
                        if ($isCorrect !== null) {
                            if ($isCorrect) {
                                echo '<h3 class="correct-answer">Your answer is correct!</h3>';
                            } else {
                                echo '<h3 class="incorrect-answer">Your answer is incorrect.</h3>';
                            }
                        }
                        ?>
                    </div>

                    <form action="<?= route_to('submitanswer', $question['question_id']); ?>" method="post">

                        <input type="hidden" id="correct_answer" name="correctanswer<?= $question['question_id'] ?>" value="<?= $question['correct_answer'] ?>">

                        <div class="row radio-question">
                            <input type="radio" id="option-1" name="answer<?= $question['question_id'] ?>" value="<?= $question['option_1'] ?>" <?php echo (session()->get('selectedAnswer' . $question['question_id']) === $question['option_1']) ? 'checked' : ''; ?>>
                            <label for="option-1">1. <?= $question['option_1'] ?></label>
                        </div>

                        <div class="row radio-question">
                            <input type="radio" id="option-2" name="answer<?= $question['question_id'] ?>" value="<?= $question['option_2'] ?>" <?php echo (session()->get('selectedAnswer' . $question['question_id']) === $question['option_2']) ? 'checked' : ''; ?>>
                            <label for="option-2">2. <?= $question['option_2'] ?></label>
                        </div>

                        <div class="row radio-question">
                            <input type="radio" id="option-3" name="answer<?= $question['question_id'] ?>" value="<?= $question['option_3'] ?>" <?php echo (session()->get('selectedAnswer' . $question['question_id']) === $question['option_3']) ? 'checked' : ''; ?>>
                            <label for="option-3">3. <?= $question['option_3'] ?></label>
                        </div>

                        <div class="row radio-question">
                            <input type="radio" id="option-4" name="answer<?= $question['question_id'] ?>" value="<?= $question['option_4'] ?>" <?php echo (session()->get('selectedAnswer' . $question['question_id']) === $question['option_4']) ? 'checked' : ''; ?>>
                            <label for="option-4">4. <?= $question['option_4'] ?></label>
                        </div>

                        <div class="row mt-3">
                            <button type="submit" class="btn btn-paragraph">Check Answer</button>
                        </div>

                    </form>
                </div>

            <?php } ?>

        </div>

        <?php
        $numCorrectAnswers = session()->get('numCorrectAnswers');
        $isAllCorrect = ($numCorrectAnswers === $countquestions);
        ?>

        <div class="row">
            <div class="col pagination pagebutton">
                <?php if (!empty($pager)) :
                    echo $pager->links('group1', 'bs_simple');
                endif ?>

                <div class="btn-group pagination" role="group" aria-label="pager counts">
                    &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-pager"><?= 'Page ' . $currentPage . ' of ' . $totalPages; ?></button>
                </div>
            </div>

            <div class="col pagebutton">
                <?php foreach ($questions as $question) { ?>

                    <?php if ($currentPage === $totalPages) : ?>
                        <?php if ($returnCompletedRows === 0) : ?>
                            <form action="<?= route_to('markcomplete'); ?>" method="POST">
                                <input type="hidden" id="level_id" name="level_id" value="<?= $question['level_id'] ?>">
                                <?php if ($isAllCorrect) : ?>
                                    <button type="submit" class="btn btn-paragraph">Mark Level as Complete</button>
                                <?php else : ?>
                                    <button type="submit" class="btn btn-locked" disabled>Correct All Answers to Mark Level as Complete</button>
                                <?php endif; ?>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>

                <?php } ?>
            </div>
        </div>

    </div>
</div>
<!-- Level Content End -->


<?= $this->endSection() ?>