<?php

namespace backend\controllers;

use common\models\User;
use common\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use backend\models\AdminUser;
class AdminController extends BackendController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback'=>function(){
                    return $this->redirect('user/login');
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /*
    |--------------------------------------------------------------------------
    | 后台欢迎页
    |--------------------------------------------------------------------------
    |
    */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionMenu()
    {
        return $this->render('menu');
    }
}
