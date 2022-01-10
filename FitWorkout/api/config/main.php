<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'name' => 'FitWorkout',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'modules' => [
        'v1' => [
            'basePath' => '@api/modules/v1',
            'class' => 'api\modules\v1\Module'
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            // 'enableCookieValidation' => false,
            // 'enableCsrfValidation'   => false,
            // 'cookieValidationKey' => 'fitworkout-api',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'fitworkout-api',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'request' => [
            'csrfParam' => '_csrf-api',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            // 'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                // [
                //     'class' => 'yii\rest\UrlRule',
                //     'controller' => 'v1/',
                //     'pluralize' => false,
                // ],
                // [
                //     'class' => 'yii\rest\UrlRule',
                //     'controller' => 'v1/default',
                //     'pluralize' => false,
                // ],
                //Login Auth
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/auth',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'POST login' => 'login',
                    ],
                    "tokens" => [
                        '{id}' => '<id:\\d+>',
                        '{token}' => '<token:\\w+>'
                    ]
                ],
                //User list
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/user',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET total' => 'total',
                        'GET ptlist' => 'ptlist',
                        'GET email/{id}' => 'email',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>'
                    ],
                ],
                //Exercise List
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/exercise',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET total' => 'total'
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>',
                    ],
                ],
                //ExerciseType List
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/exercisetype',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d+>',
                    ],
                ],
                //ExerciseCategory List
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/exercisecategory',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d+>',
                    ],
                ],
                //Product List
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/product',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET total' => 'total',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\d+>',
                    ],
                ],
                //ProductCategory List
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/productcategory',
                    'pluralize' => false,
                    'tokens' => [
                        '{id}' => '<id:\\d+>',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
