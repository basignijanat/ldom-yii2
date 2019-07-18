<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\LoginForm;
use app\models\ContactForm;

use app\models\Userlang;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function __construct($id, $module, $config = []){		
        Userlang::SetLanguage();
        
        return parent::__construct($id, $module, $config = []);
    }
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())){
            if ($model->login()){
                
                return $this->goBack();
            }
            else{
                $this->redirect('/site/login?alert=1.3');
            }            
        }
        

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();       

        if ($model->load(Yii::$app->request->post())){
            $result = $model->signup();
            
            if ($result){
                $model = new LoginForm();

                $model->name = Yii::$app->request->post('User')['username'];
                $model->password = Yii::$app->request->post('User')['password_new'];
                $model->rememberMe = true;

                if ($model->login()){

                    return $this->goBack();
                }
                
                return $this->goBack();
            }
            else{
                $this->redirect('/site/signup?alert='.$model->signup_error);
            }
        }

        //$model->password = '';
        return $this->render('signup', [
            'model' => $model,
            'alert' => '123',
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionSetlang($lang, $url)
	{
		header('Location: http://ldom-yii2/admin/language/index');
		header('Location: http://ldom-yii2'.$url);
		//setcookie('userlang', $lang);			
		/*return $this->render('setlang', [
            'url' => $url,
        ]);*/
	}
}
