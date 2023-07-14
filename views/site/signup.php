<?php

/* @var $form app\widgets\ActiveForm */
/* @var $model app\models\LoginForm */
use app\helpers\App;
use app\helpers\Html;
use app\helpers\Url;
use app\models\Country;
use app\widgets\ActiveForm;

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = $this->title;

$publishedUrl = App::publishedUrl();


$this->registerJs(<<< JS
    $('#signupform-country_id').change(function() {
        const country_id = $(this).val();

        $.ajax({
            url: app.baseUrl + 'site/states',
            data: {country_id},
            method: 'get',
            dataType: 'json',
            success: ({state_options}) => {
                $('#signupform-state_id').html(state_options);
            },
            error: (e) => {
                alert(e.responseText);
            }
        })
    })
JS);
?>
<div class="d-flex flex-column flex-root">
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #7EBFDB;">
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <a href="#" class="text-center mb-15">
                    <img src="<?= $publishedUrl . '/media/logos/logo-5.svg' ?>" alt="logo" class="h-70px" />
                </a>
                <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg text-white">Discover Amazing
                <br />Features &amp; Possibilites</h3>
            </div>
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(<?= $publishedUrl . '/media/svg/illustrations/payment.svg' ?>)"></div>
        </div>
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <div class="d-flex flex-column-fluid flex-center">
               <form id="kt_login_forgot_form"></form>
               <form id="kt_login_signin_form"></form>
                <div class="login-form login-signin">
                    <?php $form = ActiveForm::begin([
                        'id' => 'kt_login_signup_form',
                        'errorCssClass' => 'is-invalid',
                        'successCssClass' => 'is-valid',
                        'validationStateOn' => 'input',
                        'options' => [
                            'class' => 'form',
                            'novalidate' => 'novalidate'
                        ]
                    ]); ?>

                        <div class="pb-5 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
                            <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
                        </div>
                        <?= $form->field($model, 'email', ['template' => '{input}{error}'])->textInput([
                                'class' => 'form-control form-control-solid h-auto p-6 rounded-lg font-size-h6',
                                'autocomplete' => 'off',
                                'placeholder' => 'Email'
                            ]
                        ) ?>

                        <?= $form->field($model, 'password', ['template' => '{input}{error}'])->passwordInput([
                                'class' => 'form-control form-control-solid h-auto p-6 rounded-lg font-size-h6',
                                'autocomplete' => 'off',
                                'placeholder' => 'Password'
                            ]
                        ) ?>

                        <?= $form->field($model, 'name', ['template' => '{input}{error}'])->textInput([
                                'class' => 'form-control form-control-solid h-auto p-6 rounded-lg font-size-h6',
                                'autocomplete' => 'off',
                                'placeholder' => 'Name'
                            ]
                        ) ?>

                        <?= $form->field($model, 'country_id', ['template' => '{input}{error}'])->dropDownList(Country::dropdown('id', 'name',), [
                            'class' => 'form-control form-control-solid h-auto p-6 rounded-lg font-size-h6',
                            'prompt' => 'Select Country'
                        ]) ?>

                        <?= $form->field($model, 'state_id', ['template' => '{input}{error}'])->dropDownList([], [
                            'class' => 'form-control form-control-solid h-auto p-6 rounded-lg font-size-h6',
                            'prompt' => 'Select State'
                        ]) ?>


                        <div class="form-group d-flex align-items-center">
                            <div class="pl-2 font-weight-bold">Already have an account?
                                <?= Html::tag('a', 'Login here', [
                                    'href' => Url::toRoute(['login']),
                                    'class' => 'ml-1'
                                ]) ?>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                        <button type="submit" id="" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Create Account</button>

                        </div>
                    <?php ActiveForm::end(); ?>
                </div>

            </div>
        </div>
    </div>
</div>