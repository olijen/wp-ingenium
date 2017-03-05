<?php

namespace app\domain\entities;

class User
{
    /**
     * @property integer $id
     */
        public $id;
    /**
     * @property string $username
     */
        public $username;
    /**
     * @property string $password_hash
     */
        public $password_hash;
    /**
     * @property string $password_reset_token
     */
        public $password_reset_token;
    /**
     * @property string $email
     */
        public $email;
    /**
     * @property string $auth_key
     */
        public $auth_key;
    /**
     * @property integer $status
     */
        public $status;
    /**
     * @property integer $created_at
     */
        public $created_at;
    /**
     * @property integer $updated_at
     */
        public $updated_at;
    /**
     * @property string $password write-only password
     */
    
    
}