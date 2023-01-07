<?php use yii\helpers\Html;
    $post = $this->context->post;
?>
<div class="row-fluid p-5 mt-5 border border-primary rounded">
    <div class="page-header">
        <h1><?php echo Html::a(Html::encode($post->title), $post->url); ?></h1>
    </div>
    <hr class="hr hr-blurry" />
    <p class="meta">Posted
        by <?php echo $post->author->username . ' on ' . date('F j, Y', $post->create_time); ?></p>
    <p class='lead'>
        <?php
        echo $post->content;
        ?>
    <p>
    <div class="row-fluid">
        <p class="tags">
            <strong>Tags:</strong>
            <?php echo $post->tags; ?>
        </p>
        Last updated on <?php echo date('F j, Y', $post->update_time); ?>
    </div>
    <hr class="hr hr-blurry" />
    <div id="comments" class="container row-fluid p-4 g-4">
        <?php
        if($post->commentCount>=1): ?>
            <h4>
                <?php echo $post->commentCount>1 ? $post->commentCount . ' comments' : 'One comment'; ?>
            </h4>

            <?php echo $this->context->render('_comments',array(
                'post'=>$post,
                'comments'=>$post->comments,
            )); ?>
        <?php endif; ?>
        <?= Html::a('Leave your comment', ['comment/create', 'post_id' => $post->id], ['class' => 'btn btn-primary mt-3']) ?>
    </div><!-- comments -->

</div><!-- posts -->
