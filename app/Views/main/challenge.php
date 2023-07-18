<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<!-- Challenge Content Start -->
<div class="container-fluid pt-5">
    <div class="container">

        <div class="row my-5" id="course-row">

            <?php foreach ($questions as $question) { ?>
                <div class="col m-3">
                    <h1 class="level-heading">Challenge: <?= $question['course_title'] ?></h1>
                </div>

            <?php } ?>

        </div>

        <div class="row content-level">
            <p>Get ready to boost your life skills! Dive into our interactive quiz and learn while having fun. Every correct answer brings you closer to mastery!</p>
            <p>Complete Challenge with over 80% to earn a badge</p>
        </div>


        <div class="row my-2">
            <?php foreach ($questions as $question) { ?>

                <div class="col mb-3">

                    <div class="row justify-content-center">
                        <h3 class="level-heading mb-5">Question: <?= $question['question_title'] ?></h3>

                        <?php
                        $isCorrect = session()->get('isCorrect' . $question['question_id']);
                        if ($isCorrect !== null) {
                            echo '<h3 class="correct-answer">Your answer is saved!</h3>';
                        }
                        ?>
                    </div>

                    <form action="<?= route_to('submitchallengeanswer', $question['question_id']); ?>" method="post">

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
                            <button type="submit" class="btn btn-paragraph">Save Answer</button>
                        </div>

                    </form>

                </div>
            <?php } ?>
        </div>

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
                        <form action="<?= route_to('markchallengecomplete'); ?>" method="POST">
                            <input type="hidden" id="totalPages" name="totalPages" value="<?= $totalPages ?>">
                            <input type="hidden" id="level_id" name="level_id" value="<?= $question['level_id'] ?>">
                            <input type="hidden" id="course_id" name="course_id" value="<?= $question['course_id'] ?>">
                            <button type="submit" class="btn btn-paragraph">Finish Challenge</button>
                        </form>
                    <?php endif; ?>
                <?php } ?>
            </div>

        </div>

    </div>
</div>

<!-- Challenge Content End -->

<?= $this->endSection() ?>