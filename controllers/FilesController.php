<?php

namespace c006\cms\controllers;

use c006\cms\assets\ImageHelper;
use c006\cms\models\CmsFiles;
use c006\cms\models\search\CmsFiles as CssFilesSearch;
use c006\core\assets\CoreHelper;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * FilesController implements the CRUD actions for CmsFiles model.
 */
class FilesController extends Controller
{

    function init()
    {
        if (CoreHelper::checkLogin() && CoreHelper::isGuest()) {
            return $this->redirect('/user');
        }
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CmsFiles models.
     * @return mixed
     */
    public function actionIndex()
    {
//        print_r($_SERVER); exit;

        $searchModel = new CssFilesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CmsFiles model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CmsFiles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CmsFiles();

        if (isset($_POST['CmsFiles'])) {

            $image = new ImageHelper();

            $file = $_FILES['CmsFiles']['name']['file'];
            $suffix = ImageHelper::getFileExtension($file);
            $model->cms_id = $_POST['CmsFiles']['cms_id'];
            $model->name = $_POST['CmsFiles']['name'];
            $model->file = preg_replace('/[\s|\.]+/', '-', microtime(FALSE)) . '.' . $suffix;
            $model->file_type = $suffix;

            if ($model->validate() && $model->save()) {
                $image->saveImage($model->file, $_FILES['CmsFiles']['tmp_name']['file']);
            }

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            $model->file_type = 'jpg';

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CmsFiles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $file = $model->file;
        if ($model->load(Yii::$app->request->post())) {

            if (isset($_FILES['CmsFiles'])) {
                $image = new ImageHelper();
                $file = $_FILES['CmsFiles']['name']['file'];
                $suffix = ImageHelper::getFileExtension($file);
                $model->cms_id = $_POST['CmsFiles']['cms_id'];
                $model->name = $_POST['CmsFiles']['name'];
                $model->file = preg_replace('/[\s|\.]+/', '-', microtime(FALSE)) . '.' . $suffix;
                $model->file_type = $suffix;
                $image->saveImage($model->file, $_FILES['CmsFiles']['tmp_name']['file']);
            } else {
                $model->file = $file;
            }

            $model->save();

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CmsFiles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $image = new ImageHelper();
        $image->deleteFile($model->file);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CmsFiles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return CmsFiles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CmsFiles::findOne($id)) !== NULL) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
