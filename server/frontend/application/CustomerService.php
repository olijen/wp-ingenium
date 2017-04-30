<?php

namespace frontend\application;

use common\domain\human\CustomerRepository;

use common\models\CustomerRecord;
use common\models\UserRecord;
use dektrium\user\models\LoginForm;
use dektrium\user\models\RegistrationForm;

use Exception;
use Yii;

class CustomerService
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    public function __construct()
    {
        $this->customerRepository = new CustomerRepository();
    }

    public function getById($id)
    {
        return $this->customerRepository->fetchById($id);
    }

    public function update($data)
    {
        
    }

    public function delete($id)
    {

    }

    //todo: register и login привязать к предметной области

    public function register($data)
    {
        /** @var RegistrationForm $userForm */
        $userForm = Yii::createObject(RegistrationForm::class);
        $userForm->username = $data['username'];
        $userForm->password = $data['password'];
        $userForm->email = $data['email'];

        if (!$userForm->validate()) {
            Yii::$app->getResponse()->setStatusCode(400);
            return $userForm;
        }

        $user = new UserRecord;
        $user->setScenario('register');
        $user->username = $userForm->username;
        $user->password = $userForm->password;
        $user->email = $userForm->email;

        if (!$user->register()) {
            return false;
        }

        $customer = new CustomerRecord;
        $customer->id = $user->id;
        $customer->user_id = $user->id;

        if (!$customer->save() && $customer->hasErrors()) {
            return $customer;
        } elseif (!$customer->id) {
            throw new Exception('Customer creation is failed for unknown reason');
        }
        return $customer;
    }

    /**
     * @param $data
     * @return bool|string token
     * @throws \yii\base\InvalidConfigException
     */
    public function login($data)
    {
        /** @var LoginForm $loginForm */
        $loginForm = Yii::createObject(LoginForm::class);
        $loginForm->login = $data['username'];
        $loginForm->password = $data['password'];

        if (!$loginForm->login()) {
            return false;
        }
        return [
            'token' => Yii::$app->user->identity->getAuthKey(),
            'id' => Yii::$app->user->identity->getId()
        ];
    }
}
