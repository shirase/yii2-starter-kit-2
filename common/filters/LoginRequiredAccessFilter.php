<?php

namespace common\filters;

use mdm\admin\components\AccessControl;
use mdm\admin\components\Configs;
use Yii;

class LoginRequiredAccessFilter extends AccessControl
{
    function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->user->loginRequired();
            return false;
        }

        $config = Configs::instance();
        $config->onlyRegisteredRoute = true;

        return parent::beforeAction($action);
    }
}