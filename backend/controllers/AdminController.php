<?php

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
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
}
