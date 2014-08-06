<?php
/**
 * Created by PhpStorm.
 * User: 95
 * Date: 14-8-4
 * Time: 下午10:12
 */

namespace backend\models;


use yii\db\ActiveQuery;

class Scopes extends ActiveQuery
{
    /*
    |--------------------------------------------------------------------------
    | For models/Menu.php
    |--------------------------------------------------------------------------
    |
    */
    public function parent($level = 0)
    {
        $this->andWhere('parentid=:pid',[':pid'=>$level]);
        return $this;
    }
} 