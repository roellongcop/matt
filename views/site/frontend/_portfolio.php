<?php

use app\helpers\App;
use yii\helpers\Url;
?>

<div class="grid overlay">
  <figure> 
    <?= $model->getPhotoPreview(500, ['class' => 'img-responsive br-10']) ?>
    <figcaption style="overflow: auto">
      <h5><?= $model->title ?></h5>
      <p><?= $model->description ?></p>
      <?php if (App::isGuest()): ?>
        <a href="<?= Url::toRoute(['site/login']) ?>" class="btn btn-default br-10">Sign In to Join</a> 
      <?php else: ?>
        <a href="<?= $model->url ?>" target="_blank" class="btn btn-default br-10">Join</a> 
      <?php endif ?>
    </figcaption>
  </figure>
</div>