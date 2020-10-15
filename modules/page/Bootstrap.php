<?php
namespace app\modules\page;

use yii\base\Application;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{

    /**
     * @inheritDoc
     */
    public function bootstrap($app) {
        $rules = ['/' => 'page/default/index'];

        $app->getUrlManager()->addRules($rules);
    }
}