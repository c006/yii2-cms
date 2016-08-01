<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\cms\models\CmsFonts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cms-fonts-form">

    <div class="item-container margin-top-30 margin-bottom-20">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

        <?= $form->field($model, 'font_family')->textInput(['maxlength' => TRUE]) ?>

        <?= $form->field($model, 'url')->textInput(['maxlength' => TRUE]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-secondary' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
