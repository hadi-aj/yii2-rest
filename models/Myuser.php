<?php

namespace app\models;

use dektrium\user\models\User;

class Myuser extends User {

    public function fields() {
        $fields = parent::fields();
//        die('C');
        // remove fields that contain sensitive information
        unset($fields['auth_key'], $fields['password_hash']);
        array_unshift($fields, 'profile');

        return $fields;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

