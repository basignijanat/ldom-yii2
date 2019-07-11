<?php

namespace app\models;

use Yii;
use app\components\ArrayForForm;
use yii\web\UploadedFile;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	
	public $password_new;
	public $image_file;
	
	public static function tableName()
    {
        return 'userdata';
    }
	
	public function rules()
    {
        return [
			[['isadmin'], 'integer'],			
            [['authkey', 'accesstoken', 'userpic', 'password_new', 'fname', 'lname', 'mname'], 'string'],
            [['password'], 'required'],
            [['username'], 'email'],
            [['username'], 'required'],
			[['image_file'], 'file', 'extensions' => 'png, jpg'],
        ];
    }
	
	public function attributeLabels()
    {
        return [
            'id' => Yii::t('app\admin', 'ID'),
			'isadmin' => Yii::t('app\admin', 'Is Administrator'),            
            'username' => Yii::t('app\admin', 'Email'),
            'password' => Yii::t('app\admin', 'Password'),
			'password_new' => Yii::t('app\admin', 'New Password'),
			'authkey' => Yii::t('app\admin', 'Auth Key'),
            'userpic' => Yii::t('app\admin', 'Userpic'),
			'image_file' => Yii::t('app\admin', 'Download Image'),
        ];
    }
	
	public static function getUsers()
	{
		return ArrayForForm::getDropDownArray(User::find()->all(), 'username', Yii::t('app\admin', 'No User Selected'));				
	}
	
	public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
		{
			if ($this->getIsNewRecord())
			{
				$this->authkey = \Yii::$app->security->generateRandomString();
				$this->accesstoken = \Yii::$app->security->generateRandomString();
			}
			$this->savePassword($insert);
			$this->uploadUserpic();
            
            return true;
        }
        return false;
    }
	
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
		$user_data = User::find()->where(['id' => $id])->one();
		return $user_data ? $user_data : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {        
		$user_data = User::find()->where(['accesstoken' => $accesstoken])->one();
		return $user_data ? $user_data : null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user_data = User::find()->where(['username' => $username])->one();
		return $user_data ? $user_data : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authkey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authkey)
    {
        return $this->authkey === $authkey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
	
	protected function savePassword($insert)
	{		
		if ($insert)
		{
			$this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
		}
		elseif (!$insert && strlen($this->password_new) > 0)
		{			
			$this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password_new);
		}
	}
	
	protected function uploadUserpic()
    {
        if ($this->image_file = UploadedFile::getInstance($this, 'image_file'))
		{
			$fullFileName = 'upload/userpic/'.uniqid('user_').'.'.$this->image_file->extension;
			$this->image_file->saveAs($fullFileName);
			$this->userpic = '/web/'.$fullFileName;
		}
    }
}
