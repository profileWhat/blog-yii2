<?php

use yii\helpers\Html;

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Recent Comments</h3>
    </div>
    <div class="panel-body">
        <ul class="list-unstyled">
            <?php foreach ($this->context->comments as $comment): ?>
                <li><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <?php echo $comment->authorLink; ?> on
                    <?php echo Html::a(Html::encode($comment->post->title), $comment->getUrl()); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
