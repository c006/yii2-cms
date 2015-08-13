<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\cms\models\search\CmsFiles */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Files');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CMS'), 'url' => ['/cms']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="css-files-index">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Upload File'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Pages'), ['/cms/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'CSS'), ['/cms/css/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Fonts'), ['/cms/fonts/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'Code',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return '<div>{IMG_' . $model->id . '}</div>';
                },
            ],
            [
                'attribute' => 'image',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return '<div><img src="//' . str_replace('manage.', '', $_SERVER['SERVER_NAME']) . '/images/cms/' . $model->file . '" height="100" /></div>';
                },
            ],
            'name',
            'file',
            'file_type',

            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '<div class="nowrap">{update} {delete}</div>'
            ],
        ],
    ]); ?>

</div>
