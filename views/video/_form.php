<?php

use app\widgets\ActiveForm;
use app\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $form app\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['id' => 'video-form']); ?>
    <div class="row">
        <div class="col-md-6">
			<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6 text-center">
            <div class="mb-3">
                <?= Html::image($model->photo, ['w' => 300], [
                    'class' => 'img-thumbnail user-photo',
                    'loading' => 'lazy',
                ] ) ?>
            </div>
           

            <?= $form->imageGallery($model, 'photo', 'Video', [
                'buttonTitle' => 'Choose Photo',
                'ajaxSuccess' => "
                    if(s.status == 'success') {
                        $('.user-photo').attr('src', s.src);
                    }
                ",
            ]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= $form->buttons() ?>
    </div>
<?php ActiveForm::end(); ?>