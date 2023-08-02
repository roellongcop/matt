<?php

use app\helpers\App;
use app\helpers\Html;
use app\models\search\RoleSearch;
use app\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form app\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['id' => 'user-form-my-account']); ?>
    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'country_id')->textInput([
                'readonly' => true,
                'name' => '',
                'value' => $model->countryName
            ]) ?>
            <?= $form->field($model, 'state_id')->textInput([
                'readonly' => true,
                'name' => '',
                'value' => $model->stateName
            ]) ?>
        </div>
        <div class="col-md-5">
            <?= Html::image($model->photo, ['w' => 200], [
                'class' => 'img-thumbnail user-photo',
                'loading' => 'lazy',
            ] ) ?>
            <br>

            <?= $form->imageGallery($model, 'photo', 'User', [
                'ajaxSuccess' => "
                    if(s.status == 'success') {
                        $('.user-photo').attr('src', s.src);
                    }
                ",
            ]) ?>
        </div>
    </div>
    <div class="form-group"><br>
		<?= $form->buttons() ?>
    </div>
<?php ActiveForm::end(); ?>

