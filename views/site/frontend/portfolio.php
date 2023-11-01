<?php

use app\helpers\App;
use app\models\Video;
?>

<div id="portfolio" name="portfolio">
  <div class="container">
    <div class="row">
      <h2 class="centered">Live Videos</h2>
      <hr>
      <div class="col-lg-8 col-lg-offset-2 centered">
        <p class="large">Join us in our Live Prayers section for spiritual guidance and communal worship. Experience heartfelt prayers and sermons in real-time, connecting believers worldwide.</p>
      </div>
    </div>
    <div class="container">
      <div class="d-flex" style="flex-wrap: wrap;justify-content: center;gap: 20px">
        <?= App::foreach(Video::active(), fn ($model) => $this->render('_portfolio', [
          'model' => $model
        ])) ?>
      </div>

      <div class="text-center" style="margin-top: 20px;">
        <?= \yii\helpers\Html::a('View All', ['site/view-all-videos'], ['class' => 'btn btn-lg btn-warning']) ?>
      </div>
    </div>
  </div>
</div>