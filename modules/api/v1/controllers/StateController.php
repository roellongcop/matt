<?php

namespace app\modules\api\v1\controllers;

use app\modules\api\v1\models\State;

class StateController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\models\State';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'state',
    ];

    public function actionCountry($country_id = 0)
    {
        return State::find()
            ->where(['country_id' => $country_id])
            ->orderBy(['name' => SORT_ASC])
            ->all();
    }
}