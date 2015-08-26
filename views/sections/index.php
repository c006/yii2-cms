<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\cms\models\search\CmsSections */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cms Sections');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CMS'), 'url' => ['/cms/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-sections-index">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cms Sections'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Pages'), ['/cms/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'CSS'), ['/cms/css/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Fonts'), ['/cms/fonts/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Files'), ['/cms/files/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'cms_id',
                'value'     => 'cms.name'
            ],
            'name',
//            'html:ntext',
            'position',
            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '<div class="nowrap">{update} {delete}</div>'
            ],
        ],
    ]); ?>

</div>
