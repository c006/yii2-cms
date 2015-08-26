<?php
namespace c006\cms\controllers;

use c006\cms\assets\AppAssets;
use c006\cms\models\Cms;
use Yii;
use yii\web\Controller;

class PageController extends Controller
{

    public function actionIndex($id = 0)
    {
        if (!$id) {
            $id = Yii::$app->request->getQueryParam('id');
        }

        parent::init();
        AppAssets::register($this->getView());

        $model = Cms::find()
            ->where(['id' => $id])
            ->asArray()
            ->one();

        return $this->render('index', [
            'model' => $model
        ]);
    }


}