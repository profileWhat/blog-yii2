<?php

use common\widgets\Comment;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Comment $model */

$this->title = 'Update Comment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comment-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Comment::widget(['comment' => $model]); ?>
    <?= Html::a('Approve', ['approve', 'id' => $model->id], ['class' => 'btn btn-primary mt-3']) ?>

</div>
