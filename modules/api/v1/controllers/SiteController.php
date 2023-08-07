<?php

namespace app\modules\api\v1\controllers;

use app\helpers\App;
use app\helpers\Url;
use app\helpers\Html;
use app\modules\api\v1\models\form\LoginForm;
use app\modules\api\v1\models\form\SignUpForm;

class SiteController extends RestController
{
    public function actionSignup()
    {
        $model = new SignUpForm();

        if ($model->load(['SignUpForm' => App::post()]) && ($user = $model->signup()) != null) {
            return [
                'status' => 'success',
                'message' => 'Signed Up Successfully',
                'user' => $user
            ];
        }

        return [
            'status' => 'failed',
            'message' => App::post() ? Html::errorSummary($model): 'No post data',
            'errors' => $model->errors,
        ];
    }

    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(['LoginForm' => App::post()]) && ($user = $model->login()) != null) {
            return [
                'status' => 'success',
                'message' => 'Loggedin Successfully',
                'link' => Url::toRoute(['/site/api-login', 'auth_key' => $user->auth_key], true)
            ];
        }

        return [
            'status' => 'failed',
            'message' => App::post() ? 'Login Failed! Please check username and password': 'No post data',
            'errors' => $model->errors,
        ];
    }
}