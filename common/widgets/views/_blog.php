<?php use common\widgets\RecentComments;
use common\widgets\TagCloud;

?>

<div class="container">
    <div class="row justify-content-around">
        <div class="col-8">
            <?php
            echo $this->context->render('_posts', [
                'posts' => $this->context->posts,
                'pages' => $this->context->pages
            ]); ?>
        </div>
        <div class="col-4">
            <div class="sticky-top">
                <?php
                echo $this->context->render('_search', ['model' => new \common\models\PostSearch()]); ?>
                <?= TagCloud::widget() ?>
                <?= RecentComments::widget() ?>
            </div>
        </div>
    </div>
</div>