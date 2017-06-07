<?php

namespace app\modules\rest\common;

use yii\rest\Controller;

class MyRestController extends Controller {


    public function __construct($id, $module, $config = array()) {
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Headers: Authorization");
            die('0');
        }
        parent::__construct($id, $module, $config);
    }
    
}