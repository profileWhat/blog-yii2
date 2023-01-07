<?php use yii\helpers\Html;
    $comment = $this->context->comment;
?>
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