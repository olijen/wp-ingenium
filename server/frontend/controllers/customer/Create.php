<?php

namespace frontend\controllers\customer;

use common\models\UserRecord;
use dektrium\user\models\RegistrationForm;
use frontend\components\RestAction;
use common\models\CustomerRecord;
use Yii;


class Create extends RestAction
{
	public function run()
	{
		/** @var RegistrationForm $userForm */
		$userForm = Yii::createObject(RegistrationForm::className());
		$data = \Yii::$app->request->post();

		$userForm->username = $data['username'];
		$userForm->password = $data['password'];
		$userForm->email = $data['email'];

		if (!$userForm->validate()) {
			//todo: error code and return errors
			return $userForm;
		}

		/** @var UserRecord $user */
		$user = Yii::createObject(UserRecord::className());
		$user->setScenario('register');
		$user->username = $userForm->username;
		$user->password = $userForm->password;
		$user->email = $userForm->email;

		if (!$user->register()) {
			//todo: error code and return errors
			return $user;
		}

		$customer = new CustomerRecord;
		$customer->user_id = $user->id;
		
		if (!$customer->save() && $customer->hasErrors()) {
			return $customer;
		} elseif (!$customer->id) {
			throw new \Exception('Customer creation is failed for unknown reason');
		}
		return $customer;
	}

}
