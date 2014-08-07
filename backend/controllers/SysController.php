<?php

namespace backend\controllers;

use Yii;
use backend\models\AdminUser;
use backend\models\Menu;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
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
                    'save' => ['post'],
//                    'del'=>['post'],
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

    /**
     * 菜单管理-添加、修改
     * @return string
     */
    public function actionMange()
    {
        $gets = Yii::$app->request->get();
        if($gets['act']=='add')
        {
            $model = new Menu();
            $model->loadDefaultValues();
            $model->level += $gets['level'];
            $model->parentid = $gets['id'];
        }
        else
            $model = Menu::findOne($gets['id']);

        if($model->level==3)
            $model->scenario = 'fun';
        $this->layout = 'main2';
        return $this->render('mange',[
            'model'=>$model,
            'gets'=>$gets,
        ]);
    }

    /**
     * 保存修改
     * @return int
     */
    public function actionSave()
    {
        if($id = Yii::$app->request->post('id'))
            $model = Menu::findOne($id);
        else
            $model = new Menu();
        $model->load(Yii::$app->request->post());
        $rzt = $model->save();
        return $rzt?1:0;
    }
    public function actionDel()
    {
        echo 111;exit;
        return Yii::$app->request->post('id');
    }
    public function actionTest()
    {
        return StringHelper::dump(Yii::$app->request->post());
    }
}
