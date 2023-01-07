<?php

/** @var yii\web\View $this */

use common\widgets\Blog;

$this->title = 'My Yii Blog';
?>
<div class="site-index">

    <?= Blog::widget(); ?>

</div>
