<?php

namespace app\modules\rest\v1;

/**
 * rest module definition class
 */
class v1 extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\rest\v1\controllers';
    public $defaultRoute = 'user';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
