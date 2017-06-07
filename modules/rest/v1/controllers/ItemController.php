<?php

namespace app\modules\rest\v1\controllers;

use Yii;
use app\modules\rest\common\MyRestController;
use yii\filters\auth\HttpBasicAuth;

class ItemController extends MyRestController {

    public $modelClass = 'app\models\User';
    public $var;

    public function behaviors() {
        $behaviors = parent::behaviors();

        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
//            'cors' => [
//                'Origin' => ['*'],
//                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
//                'Access-Control-Request-Headers' => ['Origin', 'X-Requested-With', 'Content-Type', 'accept', 'Authorization'],
//            ],
        ];

        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
//            'only' => ['index'],
        ];
        return $behaviors;
    }

    public function beforeAction($action) {
        $this->var = json_decode(file_get_contents('php://input'));
        return parent::beforeAction($action);
    }

    public function actionView() {

        $itemId = $this->var->itemId;
        $items = [
            '1' => [
                'serial' => 777777,
                'batch' => 77
            ],
            '2' => [
                'serial' => 888888,
                'batch' => 88
            ]
        ];
        
        return $items[$itemId];
    }

    public function actionIndex() {
        return ['messasge' => 'Hello sssss Hadi!', Yii::$app->user->identity];
    }

    public function actionIndex2() {
        return ['messasge' => 'Hello sssss Hadi!', Yii::$app->user->identity];
    }

}
