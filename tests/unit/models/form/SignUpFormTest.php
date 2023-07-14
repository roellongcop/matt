<?php

namespace tests\unit\models\form;

use app\models\Country;
use app\models\State;
use app\models\form\SignUpForm;

class SignUpFormTest extends \Codeception\Test\Unit
{
    public function testSignup()
    {
        $model = new SignUpForm([
            'email' => 'test@test.com',
            'password' => 'password',
            'name' => 'Roel',
            'country_id' => Country::PH,
            'state_id' => State::ROMBLON,
        ]);
        expect_that($model->signup());

        expect_that($this->tester->grabRecord('app\models\User', [
            'email' => 'test@test.com'
        ]));
    }
}