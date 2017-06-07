<?php

namespace app\models;

use dektrium\user\models\User as BaseUser;
use app\modules\rest\v1\models\RestToken;

class User extends BaseUser {

    public static function findIdentityByAccessToken($token, $type = null) {
        
        \Yii::$app->user->enableSession = false;
        
        $old = time() - (60 * 60) * 24 * 365 ;

        // Remove old token
        RestToken::deleteAll([ '<', 'created_at', $old]);
        
        // Update created time
        $restToken = RestToken::findOne(['code' => $token]);
        if ($restToken) {
            $restToken->created_at = time();
            $restToken->save();
            return $restToken->user;
        }else {
            return NULL;
        }
    }

}
