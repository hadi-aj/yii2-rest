<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;

use dektrium\user\models\User;
//use yii\web\Controller;
//class RestuserController extends Controller {
class RestuserController extends ActiveController {

//    public function actionIndex() {
//        die('GGG');
//    }
//    public $modelClass = 'app\models\User';
    public $modelClass = 'app\models\Myuser';

    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    public function auth($username, $password) {
        
     

        /** @var LoginForm $model */
        $model = \Yii::createObject(\dektrium\user\models\LoginForm::className());

        $model->login = $username;
        $model->password = $password;
        if ($model->login()) {
            $restToken = new \app\models\RestToken();
            $restToken->created_at = time();
            $restToken->user_id = 1;
            $restToken->code = Yii::$app->security->generateRandomString();
            $restToken->save();
            
//            print_r($model->get('user'));
//            die('1');
        }

        $user = \app\models\Myuser::findIdentity(1);
        
//        echo $username;
//        echo $password;
//        die();
//        if (!$username or ! $password or ! $user)
//        //return false;
//        //OR
//            throw new \yii\base\UserException("There is an error!");
//        if ($user->validatePassword($psw))
            return $user;
//        else
        //return false;
        //OR
//            throw new \yii\base\UserException("Wrong username or password!");
    }

}
