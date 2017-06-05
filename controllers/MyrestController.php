<?php

namespace app\controllers;

use Yii;
//use yii\rest\ActiveController;
use yii\rest\Controller;
use yii\filters\auth\HttpBasicAuth;

//use yii\web\Controller;
//class RestuserController extends Controller {
class MyrestController extends Controller {

    public $modelClass = 'app\models\Myuser';

    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'only' => ['index'],
//            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

//    public function beforeAction($action) {
//        print_r($action->id);
//        die();
//        parent::beforeAction($action);
//    }

    public function actionIndex() {

        return 'dddd';// Yii::$app->user->id;
    }

}
