<?php

use yii\widgets\ListView;
?>

<?= $this->render('frontend/navbar-video') ?>
<div id="portfolio" name="portfolio">
  <div class="container">
      <div class="row">
      <h2 class="centered">All Live Videos</h2>
      <hr>
      <div class="col-lg-8 col-lg-offset-2 centered">
        <p class="large">Join us in our Live Prayers section for spiritual guidance and communal worship. Experience heartfelt prayers and sermons in real-time, connecting believers worldwide.</p>
      </div>
    </div>
    <div class="container">
      <?= ListView::widget([
        'layout' => <<< HTML
          <div class="d-flex" style="flex-wrap: wrap;justify-content: center;gap: 20px"> 
           {items} 
          </div>
          <div class="text-center">
            {pager}
          </div>
        HTML,
        'dataProvider' => $dataProvider,
        'itemView' => '/site/frontend/_portfolio',
        // 'pager' => ['class' => 'app\widgets\LinkPager'],
      ]); ?>
    </div>
  </div>
</div>
