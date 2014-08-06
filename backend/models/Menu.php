<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_menu".
 *
 * @property integer $id
 * @property integer $parentid
 * @property string $menuname
 * @property string $plat
 * @property string $route
 * @property integer $isvisible
 * @property string $menuicon
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentid', 'isvisible'], 'integer'],
            [['menuname'], 'required','message'=>'菜单名称不能为空'],
            ['route','required','message'=>'路由不能为空','on'=>'fun'],
            [['menuname', 'plat', 'route', 'menuicon'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentid' => 'Parentid',
            'menuname' => 'Menuname',
            'plat' => 'Plat',
            'route' => 'Route',
            'isvisible' => 'Isvisible',
            'menuicon' => 'Menuicon',
        ];
    }
    /**
     * 关系数据--自身关联
     * @return \yii\db\ActiveQuery
     */
    public function getSon()
    {
        return $this->hasMany(Menu::className(),['parentid'=>'id']);
    }

    /**
     * Scope
     * @return Scopes|object|\yii\db\ActiveQueryInterface|static
     */
    public static function find()
    {
        return new Scopes(get_called_class());
    }
}
