<?php

use app\widgets\Anchors;
use app\widgets\Detail;
use app\models\search\VideoSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

$this->title = 'Video: ' . $model->mainAttribute;
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => $model->indexUrl];
$this->params['breadcrumbs'][] = $model->mainAttribute;
$this->params['searchModel'] = new VideoSearch();
$this->params['showCreateButton'] = true; 
?>
<div class="video-view-page">
    <?= Anchors::widget([
    	'names' => ['update', 'duplicate', 'delete', 'log'], 
    	'model' => $model
    ]) ?> 
    <?= Detail::widget(['model' => $model]) ?>
</div>