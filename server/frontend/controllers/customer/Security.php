<?php

namespace frontend\controllers\customer;

use common\models\UserRecord;
use dektrium\user\models\LoginForm;
use dektrium\user\models\RegistrationForm;
use frontend\components\RestAction;
use common\models\CustomerRecord;
use Yii;

/**
 * Class Create
 * @package frontend\controllers\customer
 * todo: Этот экшн нужно пересмотреть и возможно перенести куда-то еще. Он идёт вразрез с архитектурой приложения.
 */
class Security extends RestAction
{
    public function run($login = false)
    {
        return ($login)
            ? $this->login()
            : $this->register();
    }

    private function login()
    {
        if (!\Yii::$app->user->isGuest) {
            //todo: return special status
            return 'user is logged in';
        }

        $data = \Yii::$app->request->post();
        /** @var LoginForm $loginForm */
        $loginForm = \Yii::createObject(LoginForm::className());
        //todo: use load() function
        $loginForm->login = $data['username'];
        $loginForm->password = $data['password'];

        if (!$loginForm->login()) {
            //todo: set special status
            return 'Login fail';
        }
        //todo: mb, return customer??? $customer = CustomerRecord::findOne(['user_id' => \Yii::$app->user->identity->getId()]);
        //todo: return only secure props!
        return \Yii::$app->user->identity;
    }

    private function register()
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
        //todo: use load() function
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
