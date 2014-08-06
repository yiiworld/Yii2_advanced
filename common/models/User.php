<?php

namespace common\models;

use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "t_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $address
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $rememberMe;
    public $auth_key;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'required','message'=>'用户名不能为空'],
            ['username', 'unique','message'=>'{attribute}{value}已经存在'],
            ['password', 'required','message'=>'密码不能为空'],
            ['rememberMe','safe'],
            [['username', 'password'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 255]
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
            'address' => '地址',
        ];
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $user = self::findOne($id)->attributes;
        $user['auth_key'] = md5($user['id']);
        return new static($user);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return md5($this->getPrimaryKey());
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return md5($this->id)===$authKey;
//        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return md5($password)===$this->password;
//        return Security::validatePassword($password, $this->password_hash);
    }
}
