<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\cms\models\search\Cms */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'CMS Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-index">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Page'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'CSS'), ['/cms/css/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Fonts'), ['/cms/fonts/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Files'), ['/cms/files/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'How it works'), ['/cms/instructions'], ['class' => 'float-right btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'layout',
                'value'     => 'layout.name'
            ],
            'url:url',
            'in_menu',
            'active',
            [
                'attribute' => 'Sections',
                'format'    => 'raw',
                'value'     => function ($model) {
                    $html = '<div class="nowrap" >';
                    $html .= Html::a(Yii::t('app', 'edit'), ['/cms/sections/index', 'CmsSections[cms_id]' => $model->id, 'sort' => 'position'], ['class' => 'btn btn-success']);
                    $html .= ' ' . Html::a(Yii::t('app', 'files'), ['/cms/files/index', 'CmsSections[cms_id]' => $model->id], ['class' => 'btn btn-success']);
                    $html .= '</div>';

                    return $html;
                }
            ],

            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '<div class="nowrap">{update} {delete}</div>'
            ],
        ],
    ]); ?>

</div>
