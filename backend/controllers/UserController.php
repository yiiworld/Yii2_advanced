<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use backend\models\LoginForm;
use backend\models\AdminUser;
use yii\data\Pagination;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use yii\web\Response;

class UserController extends BackendController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login','reg','add', 'error','test'],
                        'allow' => true,
                    ],
                    [
                        'actions'=>['mange'],
                        'allow'=>true,
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback'=>function($rules,$action)
                {
                    return $this->redirect('user/login');
                },
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                    'reg'=>['post'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public  function  actionT()
    {
    }
    public function actionTest()
    {
        return StringHelper::dump(Yii::$app->user->identity);
//        $this->layout = 'main3';
//        return $this->render('test');
    }
    public function actionMange()
    {
//        $this->layout = 'main';
        $search = [
            
        ];
        $query = AdminUser::find()->filterWhere(['like','username',$_GET['username']]);
        $search['username'] = $_GET['username'];
        $cntquery = clone $query;
        $pages = new Pagination([
            'totalCount'=>$cntquery->count(),
            'defaultPageSize'=>15,
            
        ]);
        if(Yii::$app->request->get('act')=='export')
        {
            $q = clone $query;
            $l = $q->asArray()->all();
            $titlelist = [
                'id'=>'ID',
                'username'=>'用户名',
            ];
            $csv = StringHelper::csvput($l,'user',$titlelist);
            $response = new Response();
            $response->sendFile($csv)->send();
        }
        $list = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->orderby('id desc')
                ->all();
        //For AutoComplate
        $alist = $query->all();
        $autolist = ArrayHelper::getColumn($alist,'username');
        return $this->render('mange',[
            'pages'=>$pages,
            'list'=>$list,
            'search'=>$search,
            'autolist'=>$autolist,
        ]);
    }
    public function actionAdd()
    {
        $this->layout = 'main2';
        $model = new AdminUser();
        $model->scenario = 'reg';
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->save())
                $this->redirect('user/mange');
            else
                return StringHelper::dump($model);
        }
        return $this->render('add',[
            'model'=>$model,
        ]);
    }
    /**
     * 登录
     * @return type
     */
    public function actionLogin()
    {
        $this->layout = "main2";
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        $adminuser = new \backend\models\AdminUser();
        $adminuser->scenario = 'reg';
        if(\Yii::$app->request->isPost)
        {
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            } else {
                return $this->render('login',[
                    'model'=>$model,
                    'adminuser'=>$adminuser,
                    'loginerror'=>true,
                ]);
            }
        }
        return $this->render('login', [
            'model' => $model,
            'adminuser'=>$adminuser,
        ]);
    }
    /**
     * 注册
     */
    public function actionReg()
    {
        $model = new \backend\models\AdminUser();
        $model->scenario = "reg";
        $model->load(Yii::$app->request->post());
        if(Yii::$app->request->isAjax)
        {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\widgets\ActiveForm::validate($model);
        }
        if(\Yii::$app->request->isPost)
        {
            if($model->validate() && $model->save() && Yii::$app->user->login($model))
            {
                return $this->goHome ();
            }
        }
    }
    /**
     * 退出
     * @return type
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}
