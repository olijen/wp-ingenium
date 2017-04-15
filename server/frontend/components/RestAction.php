<?php

namespace frontend\components;

use yii\base\Action;
use Yii;

class RestAction extends Action
{
    public function getUser()
    {
        return Yii::$app->user->identity;
    }

    public function getUserId()
    {
        return $this->getUser()->id;
    }
}
