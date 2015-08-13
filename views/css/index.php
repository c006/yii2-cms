<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel c006\cms\models\search\CmsCss */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'CSS');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CMS'), 'url' => ['/cms']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="cms-css-index">

    <h1 class="title-large"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Add Css'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Pages'), ['/cms/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Fonts'), ['/cms/fonts/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Files'), ['/cms/files/index'], ['class' => 'btn btn-primary']) ?>

        <?= Html::a(Yii::t('app', 'Online CSS Generators'), 'http://www.sitepoint.com/10-best-css3-code-generators/', ['class' => 'btn btn-success float-right', 'target' => '_blank']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'selector',
            'css:ntext',

            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '<div class="nowrap">{update} {delete}</div>'
            ],
        ],
    ]); ?>

</div>
