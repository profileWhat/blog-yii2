<?php ?>
<div class="container post-view">

    <?php use common\widgets\Post;
    use yii\widgets\LinkPager;

    foreach ($this->context->posts as $post): ?>
        <?= Post::widget(['post' => $post]); ?>
    <?php endforeach; ?>

    <?php echo LinkPager::widget([
        'pagination' => $this->context->pages,
    ]); ?>
</div>