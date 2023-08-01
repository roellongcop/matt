<?php

namespace app\modules\api\v1\controllers;

use app\helpers\App;
use app\helpers\Url;
use app\modules\api\v1\models\form\LoginForm;

class SiteController extends RestController
{

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
            'post' => App::post(),
            'message' => $model->errors ?: 'No post data'
        ];
    }
}