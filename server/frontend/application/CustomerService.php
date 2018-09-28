<?php

namespace frontend\application;

use common\domain\human\CustomerRepository;

use common\models\CustomerRecord;
use common\models\UserRecord;
use dektrium\user\models\LoginForm;
use dektrium\user\models\RegistrationForm;

use Exception;
use Yii;

class CustomerService implements ICustomerService
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    public function __construct(CustomerRepository $cr)
    {
        $this->customerRepository = $cr;
    }
    
    public function getById($id)
    {
        exit;
        return $this->customerRepository->fetchById($id);
    }

    public function updateById($customerId, $customerData)
    {
        // TODO: Implement updateById() method.
    }

    public function deleteById($customerId)
    {
        // TODO: Implement deleteById() method.
    }

    //todo: register и login привязать к предметной области

    /**
     * @param $customerData
     * @return bool|CustomerRecord|RegistrationForm
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function register($customerData)
    {
        /** @var RegistrationForm $userForm */
        $userForm = Yii::createObject(RegistrationForm::class);
        $userForm->username = $customerData['username'];
        $userForm->password = $customerData['password'];
        $userForm->email = $customerData['email'];

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
     * @param $loginData
     * @return bool|string token
     * @throws \yii\base\InvalidConfigException
     * @internal param $data
     */
    public function login($loginData)
    {
        /** @var LoginForm $loginForm */
        $loginForm = Yii::createObject(LoginForm::class);
        $loginForm->login = $loginData['username'];
        $loginForm->password = $loginData['password'];

        if (!$loginForm->login()) {
            return false;
        }
        return [
            'token' => Yii::$app->user->identity->getAuthKey(),
            'id' => Yii::$app->user->identity->getId()
        ];
    }
}
