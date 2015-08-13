<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\cms\models\CmsSections */

$this->title = Yii::t('app', 'Create Cms Sections');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CMS'), 'url' => ['/cms/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cms Sections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-sections-create">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
