<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\EduForm;
use app\models\EduFormSearch;
use app\models\Userlang;
use app\models\Language;
use app\models\Teacher;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EduFormController implements the CRUD actions for EduForm model.
 */
class EduformController extends Controller
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
     * Lists all EduForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EduFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EduForm model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EduForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EduForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

		$languages = Language::getLanguages();
		$teachers = Teacher::getTeachers();
		
        return $this->render('create', [
            'model' => $model,
			'languages' => $languages,
			'teachers' => $teachers,
        ]);
    }

    /**
     * Updates an existing EduForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

		$languages = Language::getLanguages();
		$teachers = Teacher::getTeachers();
		
        return $this->render('update', [
            'model' => $model,
			'languages' => $languages,
			'teachers' => $teachers,
        ]);
    }

    /**
     * Deletes an existing EduForm model.
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
     * Finds the EduForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EduForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EduForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app\admin', 'The requested page does not exist.'));
    }
}
