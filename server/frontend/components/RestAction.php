<?php

namespace frontend\components;


use yii\base\Action;
use Yii;

class RestAction extends Action
{
	public function getUserId()
	{
		return Yii::$app->user->identity->id;
	}
}
