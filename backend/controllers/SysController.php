<?php

namespace backend\controllers;

use Yii;
use backend\models\AdminUser;
use backend\models\Menu;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\StringHelper;

class SysController extends \yii\web\Controller
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
                    'mange' => ['post'],
                ],
            ],
        ];
    }
    /**
     * 列表
     * @return string
     */
    public function actionIndex()
    {
        $list = Menu::find()->parent()->all();
        return $this->render('index',[
            'list'=>$list,
        ]);
    }
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $pid = Yii::$app->request->get('pid');
        $act = Yii::$app->request->get('act');
        if($act=='add')
            $model = new Menu();
        else
            $model = Menu::findOne($id);
        if(Menu::findOne($pid)->parentid===0)
            $model->scenario = 'fun';
        $model->loadDefaultValues();
//        return StringHelper::dump($model->attributes);
        $this->layout = 'main2';
        return $this->render('add',[
            'model'=>$model,
            'id'=>$id,
            'pid'=>$pid,
            'act'=>$act,
        ]);
    }
    public function actionMange()
    {
        $model = new Menu();
        $model->load(Yii::$app->request->post());
        $rzt = $model->save();
        return $rzt?1:0;
        return StringHelper::dump($model);
    }
}
