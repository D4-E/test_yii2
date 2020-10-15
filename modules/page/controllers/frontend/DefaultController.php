<?php

namespace app\modules\page\controllers\frontend;

use yii\web\Controller;

/**
 * Default controller for the `page` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTelegramError() {
        return $this->render('telegram-error');
    }
}
