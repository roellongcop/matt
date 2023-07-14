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

        // using Yii2 module actions to check email was sent
        $this->tester->seeEmailIsSent();

        /** @var MessageInterface $emailMessage */
        $emailMessage = $this->tester->grabLastSentEmail();
        expect('valid email is sent', $emailMessage)->isInstanceOf('yii\mail\MessageInterface');
        expect($emailMessage->getTo())->hasKey('test@test.com');
    }

    public function testInvalidEmail()
    {
        $model = new SignUpForm([
            'email' => 'asdasdasd',
            'password' => 'password',
            'name' => 'Roel',
            'country_id' => Country::PH,
            'state_id' => State::ROMBLON,
        ]);
        expect_not($model->signup());
        expect($model->errors)->hasKey('email');
    }

    public function testInvalidCountry()
    {
        $model = new SignUpForm([
            'email' => 'test@test.com',
            'password' => 'password',
            'name' => 'Roel',
            'country_id' => 456464,
            'state_id' => State::ROMBLON,
        ]);
        expect_not($model->signup());
        expect($model->errors)->hasKey('country_id');
    }

    public function testInvalidState()
    {
        $model = new SignUpForm([
            'email' => 'test@test.com',
            'password' => 'password',
            'name' => 'Roel',
            'country_id' => Country::PH,
            'state_id' => 111111111,
        ]);
        expect_not($model->signup());
        expect($model->errors)->hasKey('state_id');
    }
}