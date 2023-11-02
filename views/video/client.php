<?php

use app\helpers\Html;
use app\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Live Videos';
$this->params['breadcrumbs'][] = $this->title;
$this->params['activeMenuLink'] = Url::toRoute(['client']);
?>
<div class="video-index-page">
    <?= Html::a('View all live videos', ['site/view-all-videos'], [
        'class' => 'text-uppercase btn btn-lg btn-outline-success font-weight-bolder',
        'target' => '_blank'
    ]) ?>
</div>