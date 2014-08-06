<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_role".
 *
 * @property integer $id
 * @property string $rolename
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rolename'], 'required'],
            [['rolename'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rolename' => 'Rolename',
        ];
    }
}
