<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model c006\cms\models\CmsFonts */

$this->title = Yii::t('app', 'Create Fonts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CMS'), 'url' => ['/cms']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fonts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-fonts-create">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
