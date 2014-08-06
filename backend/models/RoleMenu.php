<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_role_menu".
 *
 * @property integer $id
 * @property integer $roleid
 * @property integer $menuid
 */
class RoleMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_role_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roleid', 'menuid'], 'required'],
            [['roleid', 'menuid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'roleid' => 'Roleid',
            'menuid' => 'Menuid',
        ];
    }
}
