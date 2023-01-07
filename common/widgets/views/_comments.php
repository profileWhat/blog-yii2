<?php use common\widgets\Comment;
use yii\helpers\Html;

?>

<div data-bs-spy="scroll" data-bs-offset="0" data-bs-smooth-scroll="true" class="comments container p-4 border border-secondary rounded" style="height: 200px; overflow-y: scroll;">
    <?php foreach ($comments as $comment): ?>
        <?= Comment::widget(['comment' => $comment]); ?>
        <hr class="hr hr-blurry" />
    <?php endforeach; ?>
</div>
