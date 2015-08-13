<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\cms\models\CmsCss */

$this->title = Yii::t('app', '', [
        'modelClass' => 'CSS',
    ]) . ' ' . $model->selector;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CMS'), 'url' => ['/cms']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CSS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->selector, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cms-css-update">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
