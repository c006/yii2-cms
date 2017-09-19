<?php

use yii\widgets\ActiveForm;
use c006\cms\assets\AppHelper;
use c006\core\assets\CoreHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\cms\models\CmsSections */
/* @var $form yii\widgets\ActiveForm; */
?>

<div class="cms-sections-form">

    <?php $form = ActiveForm::begin([]); ?>

    <?
    $model_link = \c006\cms\models\Cms::find()->orderBy('name')->all();
    $model_link = ArrayHelper::map($model_link, 'id', 'name');
    echo $form->field($model, 'cms_id')->dropDownList($model_link)->label('CMS Page') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => TRUE]) ?>

    <?= $form->field($model, 'html')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'position')->dropDownList(CoreHelper::minMaxRange(1, sizeof(AppHelper::getSections($model->cms_id)) + 1)) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-secondary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= c006\spinner\SubmitSpinner::widget(['form_id' => $form->id]); ?>


