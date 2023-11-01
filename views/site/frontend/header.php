<?php

use yii\helpers\Html;
use app\helpers\App;
?>

<div id="home-section">
  <div id="headerwrap" name="home">
    <header class="clearfix tb"> 
      <div class="tb-cell text-center">
        <h1>Matthew 18:20</h1>
        <p>“For where two or three have gathered together in My name, I am here in their midst” </p>
        <?= Html::a(App::isGuest() ? 'Sign In': 'View Dashboard', ['login'], [
          'class' => 'btn btn-lg btn-signin'
        ]) ?>
    	</div>
  	</header>
  </div>
</div>
