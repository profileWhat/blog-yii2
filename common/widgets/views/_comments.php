<?php use yii\helpers\Html;

?>

<div data-bs-spy="scroll" data-bs-offset="0" data-bs-smooth-scroll="true" class="comments container p-4 border border-secondary rounded" style="height: 200px; overflow-y: scroll;">
    <?php foreach ($comments as $comment): ?>
        <div class="comment" id="c<?php echo $comment->id; ?>">

            <div class="author">
                <?php echo $comment->authorLink; ?> says at
            </div>

            <div class="time">
                <?php echo date('F j, Y \a\t h:i a', $comment->create_time); ?>
            </div>

            <div class="content">
                <?php echo nl2br(Html::encode($comment->content)); ?>
            </div>

        </div><!-- comment -->
        <hr class="hr hr-blurry" />
    <?php endforeach; ?>
</div>
