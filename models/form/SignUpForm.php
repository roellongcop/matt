<?php

namespace app\models\form;

use app\helpers\App;
use app\models\Role;
use app\models\User;

class SignUpForm extends \yii\base\Model
{
    public $email;
    public $password;
    public $name;
    public $country_id;
    public $state_id;

    public $_user;

  
    public function rules()
    {
        return [
            [['email', 'password', 'name', 'country_id', 'state_id'], 'required'],
            [['email', 'password', 'name'], 'string', 'max' => 225],
            [['country_id', 'state_id'], 'integer'],
            ['country_id', 'exist', 'targetClass' => 'app\models\Country', 'targetAttribute' => 'id'],
            ['state_id', 'exist', 'targetClass' => 'app\models\State', 'targetAttribute' => 'id'],
            [['email', 'password'], 'trim'],
            ['email', 'email'],
             ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],
        ];
    }


    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->setPassword($this->password);
            $user->name = $this->name;
            $user->email = $this->email;
            $user->username = $this->email;
            $user->status = User::STATUS_INACTIVE;
            $user->is_blocked = User::UNBLOCKED;
            $user->role_id = Role::ADMIN;

            if ($user->save()) {
                return $user;
            }
            else {
                $this->addError('user', $user->errors);
            }

        }
        return false;
    }
}