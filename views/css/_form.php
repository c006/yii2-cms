<?php

use c006\activeForm\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\cms\models\CmsCss */
/* @var $form c006\activeForm\ActiveForm */
?>

<div class="cms-css-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'selector')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'css')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
