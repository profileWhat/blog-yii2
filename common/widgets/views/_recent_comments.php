<?php

use yii\helpers\Html;

?>
<div class="container border border-1 border-primary rounded mt-3 p-2 g-2">
    <h4 class="panel-title">Recent Comments</h4>
    <div>
        <?php foreach ($this->context->comments as $comment): ?>
            <div class="card">
                <div class="card-title p-2">
                    <?php echo $comment->authorLink; ?> on
                    <?php echo Html::a(Html::encode($comment->post->title), $comment->getUrl()); ?>
                    says:
                </div>
                <div class="card-body">
                    <?php echo $comment->content; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
