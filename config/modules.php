<?php

return [
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['hadi'],
            'modelMap' => [
                'User' => 'app\models\User',
//                'LoginForm' => 'app\models\LoginForm',
            ],
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'rest-v1' => [
            'class' => 'app\modules\rest\v1\v1'
        ]
    ];

