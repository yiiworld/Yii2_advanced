<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_admin_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 */
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\validators\CompareValidator;
use yii\validators\DefaultValueValidator;

class AdminUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $auth_key;
    public $password_repeat;
    public $role;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_admin_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'required','message'=>'用户名不能为空'],
            ['username','unique','message'=>'{attribute}"{value}"已存在'],
            ['password','required','message'=>'密码不能为空'],
            ['password_repeat','required','message'=>'请重复输出密码','on'=>'reg'],
            ['password_repeat','compare','compareAttribute'=>'password','message'=>'两次输入密码不一致','on'=>'reg'],
            [['username'], 'string', 'max' => 200],
            [['password'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'password' => '密码',
            'password_repeat' => '重复输入密码',
        ];
    }
    public function beforeSave($insert) {
        if($this->isNewRecord)
        {
            $this->password = \Yii::$app->security->generatePasswordHash($this->password);
        }
        return true;
    }

    /**
     * 获取角色名称
     * @param $id
     * @return string
     */
    public static function getRolename($id)
    {
        $user = self::findOne($id);
        $role = $user->roleid;
        $rolename = '';
        foreach($role as $v)
        {
            $rolename .= $v->rolename->rolename.',';
        }
        return rtrim($rolename,',');
    }

    /**
     * 获取用户菜单
     * @param $id
     * @return array
     */
    public static  function getRolemenu($id)
    {
        $user = self::findOne($id);
        $role = $user->roleid;
        $roleids = ArrayHelper::getColumn($role,'roleid');
        return $roleids;
    }
    /*
    |--------------------------------------------------------------------------
    | 关联表
    |--------------------------------------------------------------------------
    |
    */
    public function getRoleid()
    {
        return $this->hasMany(UserRole::className(),['userid'=>id]);
    }

    public static function findByUsername($username)
    {
        return self::find()->where('username=:u', [':u'=>$username])->one();
    }
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
    public static function findIdentity($id)
    {
        $user = self::find()->where('id=:id',[':id'=>$id])->one()->toArray();
        $user['role'] = 1;
        return new static($user);
//        return self::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        return md5($this->primaryKey);
    }
    public function validateAuthKey($authKey)
    {
        return $authKey===$this->getAuthKey();
    }
}
