<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\EduForm;
use app\models\EduFormSearch;
use app\models\Userlang;
use app\models\Language;
use app\models\Teacher;
use app\models\Price;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\ArrayForForm;

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
		$model = $this->findModel($id);
		
		$teachersInString = Teacher::getTeachersInString(explode(' ', $model->teacher_ids), ', ');
		$pricesInString = Price::getPricesInString(explode(' ', $model->prices), ', ');
		$languageById = Language::getLanguageById($model->language_id);
		
        return $this->render('view', [
            'model' => $model,
			'teachersInString' => $teachersInString,
			'pricesInString' => $pricesInString,
			'languageById' => $languageById,
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

		$essentialData = self::getEssentialData($model);
		
        return $this->render('create', [
            'model' => $model,
			'languages' => $essentialData['languages'],
			'teachers' => $essentialData['teachers'],
			'selectedTeachers' => $essentialData['selectedTeachers'],
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

		$essentialData = self::getEssentialData($model);		
				
        return $this->render('update', [
            'model' => $model,
			'languages' => $essentialData['languages'],
			'teachers' => $essentialData['teachers'],
			'selectedTeachers' => $essentialData['selectedTeachers'],
			'prices' => $essentialData['prices'],
			'selectedPrices' => $essentialData['selectedPrices'],
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

	public function actionEditteacherids()
	{
		$model = $this->findModel($id);
		
		$essentialData = self::getEssentialData($model);		
				
        return $this->render('form_teacher_ids', [            
			'teachers' => $essentialData['teachers'],
			'selectedTeachers' => $essentialData['selectedTeachers'],
        ]);
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
	
	protected static function getEssentialData($model)
	{
		return array(
			'languages' => Language::getLanguages(),
			'teachers' => Teacher::getTeachers(),
			'selectedTeachers' => ArrayForForm::excludeDropDownById(Teacher::getTeachers(), explode(' ', $model->teacher_ids)),
			'prices' => Price::getPrices(),
			'selectedPrices' => ArrayForForm::excludeDropDownById(Price::getPrices(), explode(' ', $model->prices)),
		);
	}
}
