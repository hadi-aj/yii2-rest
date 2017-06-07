<?php

namespace app\modules\rest\v1\models;

use dektrium\user\models\LoginForm as BaseLoginForm;

class LoginForm extends BaseLoginForm {
    public function __construct(\dektrium\user\Finder $finder, $config = array()) {
        \Yii::$app->user->enableSession = false;
        parent::__construct($finder, $config);
    }
}