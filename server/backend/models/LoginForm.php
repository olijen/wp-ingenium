<?php
namespace backend\models;

use common\models\UserRecord;
use dektrium\user\helpers\Password;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if ($user === null || !Password::validate($this->password, $this->user->password_hash))
                $this->addError($attribute, Yii::t('user', 'Invalid login or password'));
            if (!$user->isAdmin) {
                $this->addError($attribute, 'User is not admin.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return UserRecord|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = UserRecord::find()
                ->where(['username' => $this->username])
                ->one();
        }
        return $this->_user;
    }
}
