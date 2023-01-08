<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search container border border-1 border-primary rounded mt-3 p-2 g-2">
    <h4>Search by Tags</h4>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tags') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary mt-3']) ?>
        <?= Html::a('Reset', ['reset'], ['class' => 'btn btn-default mt-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>