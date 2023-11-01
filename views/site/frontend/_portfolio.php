<div class="grid overlay">
  <figure> 
    <?= $model->getPhotoPreview(500, ['class' => 'img-responsive br-10']) ?>
    <figcaption style="overflow: auto">
      <h5><?= $model->title ?></h5>
      <p><?= $model->description ?></p>
      <a href="<?= $model->url ?>" target="_blank" class="btn btn-default br-10">Join</a> 
    </figcaption>
  </figure>
</div>