<?php

namespace app\modules\api\v1\controllers;

use app\helpers\App;
use app\models\form\LoginForm;

class SiteController extends RestController
{

    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(App::post()) && $model->validate()) {
            return [
                'status' => 'success',
                'message' => 'Loggedin Successfully'
            ];
        }

        return [
            'status' => 'failed',
            'message' => $model->errors ?: 'No post data'
        ];
    }
}