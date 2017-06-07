<?php

namespace app\modules\rest\v1\models;

use dektrium\user\models\User as BaseUser;

/**
 * This is the model class for table "user".
 *
 * @property RestToken[] $restTokens
 */
class User extends BaseUser {

    public $token;

    public function fields() {
//        $fields = parent::fields();
//        array_unshift($fields, 'profile');
//        array_unshift($fields, 'token');
//
//        unset($fields['auth_key'], $fields['password_hash']);

        return ['token', 'profile'];
    }

    public function getRestTokens() {
        return $this->hasMany(RestToken::className(), ['user_id' => 'id']);
    }

}
