<?php
namespace backend\controllers;


use Yii;
use common\models\Organicas;
use backend\models\search\OrganicasSearch;
use common\models\Cliente;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveQuery;
use yii\web\UploadedFile;
/**
 * OrganicasController implements the CRUD actions for Organicas model.
 */
class OrganicasController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post']
                ]
            ]
        ];
    }

    /**
     * Lists all Organicas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrganicasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder'=>['id'=>SORT_DESC]
        ];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Organicas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Organicas();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->captura = UploadedFile::getInstance($model, 'captura');
            if (!$model->upload()) {
                return false;
            }

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'clientes' => Cliente::find()->all(),
            ]);
        }
    }

    /**
     * Updates an existing Organicas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $model->capturaTemp = UploadedFile::getInstance($model, 'capturaTemp');
                /*echo $model->captura;
                exit();*/
            if (!empty($model->capturaTemp)):
                //$model->captura = UploadedFile::getInstance($model, 'captura');  
                if (!$model->upload()) {
                    return false;
                }
                $model->captura = $model->capturaTemp->baseName.'.'.$model->capturaTemp->extension;
                $model->save();
            endif;

            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'clientes' => Cliente::find()->all(),
            ]);
        }
    }

    /**
     * Deletes an existing Organicas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Organicas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organicas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Organicas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}