<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Language;
use app\models\LanguageSearch;
use app\models\Userlang;
use app\models\Image;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LanguageController implements the CRUD actions for Language model.
 */
class LanguageController extends Controller
{
    /**
     * {@inheritdoc}
     */
	
	public function __construct($id, $module, $config = [])
	{
		parent::__construct($id, $module, $config = []);
		Userlang::SetLanguage();
	}

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Language models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LanguageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,            
        ]);
    }

    /**
     * Displays a single Language model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		$data = $this->essentialData(['model' => $this->findModel($id)]);
		
        return $this->render('view', $data);
    }

    /**
     * Creates a new Language model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Language();
        $data = $this->essentialData(['model' => $model]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }		
		
        return $this->render('create', $data);
    }

    /**
     * Updates an existing Language model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = new Image();

        $data = $this->essentialData(['model' => $model, 'image' => $image]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        elseif ($image->load(Yii::$app->request->post())){
            $image->uploadTemp();
        }
        elseif (Yii::$app->request->post('cropped_image')){
            
            return json_encode([
                'uploaded_file' => $image->uploadCropped(
                    Yii::$app->request->post('cropped_image'), 
                    Language::getUploadDir(), 
                    Language::getImagePrefix(), 
                    Language::getImageExt()
                ),
            ]);
        }
		
        return $this->render('update', $data);
    }

    /**
     * Deletes an existing Language model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Language model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Language the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Language::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app\admin', 'The requested page does not exist.'));
    }

    protected function essentialData($base){
        
        return array_merge(
            $base, [
                'languages' => Userlang::getLanguages(),            
            ]
        );
    }
}
