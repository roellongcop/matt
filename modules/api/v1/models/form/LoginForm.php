<?php

namespace app\modules\api\v1\models\form;


class LoginForm extends \app\models\form\LoginForm
{
	public function login()
    {
        if ($this->validate()) {
            return $this->getUser();
        }
    }
}