<?php

use c006\activeForm\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\cms\models\search\CmsFiles */
/* @var $form c006\activeForm\ActiveForm */
?>

<div class="css-files-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'file') ?>

    <?= $form->field($model, 'file_type') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
