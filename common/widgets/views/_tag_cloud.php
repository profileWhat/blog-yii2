<?php

use yii\helpers\Html;

?>
<div class="container border border-1 border-primary rounded mt-3 p-2 g-2">
    <h4>Most used Tags:</h4>
    <?php foreach ($this->context->tags as $tag => $weight): ?>
        <div class="container mt-3">
            <?= Html::a(Html::encode($tag), ['site/index', 'tags' => $tag]); ?>
        </div>
    <?php endforeach; ?>
</div>
