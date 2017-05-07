<?php

namespace frontend\components;

use frontend\application\ServiceTrait;

use yii\base\Action;
use Yii;

class RestAction extends Action
{
    use ServiceTrait;

    public function getUser()
    {
        return Yii::$app->user->identity;
    }

    public function getUserId()
    {
        return $this->getUser()->id;
    }
}
