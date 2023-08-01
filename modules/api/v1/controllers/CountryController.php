<?php

namespace app\modules\api\v1\controllers;

use app\modules\api\v1\models\Country;

class CountryController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\models\Country';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'country',
    ];

    public function actionList()
    {
        return Country::find()->all();
    }
}