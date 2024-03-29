<?php

use c006\activeForm\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\cms\models\CmsFiles */
/* @var $form c006\activeForm\ActiveForm */
?>

<div class="css-files-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?
    $model_link = \c006\cms\models\Cms::find()->orderBy('name')->all();
    $model_link = ArrayHelper::map($model_link, 'id', 'name');
    echo $form->field($model, 'cms_id')->dropDownList($model_link)->label('CMS Page') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'file')->fileInput(['class' => 'form-control']) ?>

    <?= $form->field($model, 'file_type')->hiddenInput()->label(FALSE) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
