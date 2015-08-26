<?php

use c006\activeForm\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\cms\models\Cms */
/* @var $form c006\activeForm\ActiveForm */
?>

<div class="cms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?
    $model_link = \c006\cms\models\CmsLayout::find()->orderBy('name')->all();
    $model_link = ArrayHelper::map($model_link, 'id', 'name');
    echo $form->field($model, 'layout_id')->dropDownList($model_link) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

    <?
    $model_link = \c006\cms\models\CmsCss::find()->orderBy('selector')->all();
    $model_link = ArrayHelper::map($model_link, 'id', 'selector');
    echo $form->field($model, 'css_id')->dropDownList($model_link)->label('Title Css') ?>

    <?= $form->field($model, 'in_menu')->dropDownList(['No', 'Yes']) ?>

    <?= $form->field($model, 'active')->dropDownList(['No', 'Yes']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
