<?php

namespace app\modules\rest\v1\controllers;

use Yii;
use app\modules\rest\common\MyRestController;
//use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use app\modules\rest\v1\models\LoginForm;
use app\modules\rest\v1\models\User;
use app\modules\rest\v1\models\RestToken;

//use dektrium\user\models\User;
//class UserController extends ActiveController {
class UserController extends MyRestController {

    public $modelClass = 'app\modules\rest\v1\models\User';

    public function behaviors() {
        $behaviors = parent::behaviors();
        
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
        ];
        
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'only' => ['login'],
            'auth' => [$this, 'auth']
        ];
        
        return $behaviors;
    }

    public function actionLogin() {

        $user = User::findOne(Yii::$app->user->id);

        $restToken = new RestToken();
        $restToken->created_at = time();
        $restToken->user_id = $user->id;
        $restToken->code = Yii::$app->security->generateRandomString();
        $restToken->save();

        $user->token = $restToken->code;

        return $user;
    }

    public function auth($username, $password) {

        /** @var LoginForm $model */
        $model = Yii::createObject(LoginForm::className());

        $model->login = $username;
        $model->password = $password;
        if ($model->login()) {
            $user = User::findOne(['username' => $username]);
            return $user;
        } else {
            return NULL;
        }
    }

}

//            throw new \yii\base\UserException(Yii::t('app', 'Invalid login or password'));