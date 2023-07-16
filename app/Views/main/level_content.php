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

            <?php foreach ($paragraphs as $paragraph) { ?>

                <p class="content-level"><?= $paragraph['content'] ?></p>

            <?php } ?>
        </div>

        <div class="row justify-content-between">
            <div class="col-5 pagination">
                <?php if (!empty($pager)) :
                    echo $pager->links('group1', 'bs_simple');
                endif ?>

                <div class="btn-group pagination" role="group" aria-label="pager counts">
                    &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-pager"><?= 'Page ' . $currentPage . ' of ' . $totalPages; ?></button>
                </div>
            </div>

            <div class="col-3">
                <?php if ($currentPage === $totalPages) : ?>
                    <?php if ($returnCompletedRows === 0) : ?>
                        <form action="<?= route_to('markcomplete'); ?>" method="POST">
                            <input type="hidden" id="level_id" name="level_id" value="<?= $paragraph['level_id'] ?>">
                            <button type="submit" class="btn btn-paragraph">Mark Level as Complete</button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
<!-- Level Content End -->


<?= $this->endSection() ?>