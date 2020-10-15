<?php

return [
    'page' => [
        'class' => 'app\modules\page\Module',
        'controllerNamespace' => 'app\modules\page\controllers\frontend',
        'viewPath' => '@app/modules/page/views/frontend',
    ],
    'user' => [
        'class' => 'app\modules\user\Module',
        'controllerNamespace' => 'app\modules\user\controllers\frontend',
        'viewPath' => '@app/modules/user/views/frontend',
    ],
];
