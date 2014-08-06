<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_user_role".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $roleid
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'roleid'], 'required'],
            [['userid', 'roleid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'roleid' => 'Roleid',
        ];
    }

    public function getRolename()
    {
        return $this->hasOne(Role::className(),['id'=>'roleid']);
    }
}
