<?php

use app\helpers\App;
use app\helpers\Html;
use app\helpers\Url;
use app\widgets\Alert;

$this->title = 'Signup Success - Email Verification';
$this->params['breadcrumbs'][] = $this->title;

$publishedUrl = App::publishedUrl();

$this->registerCss(<<< CSS
    .ss-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 40px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .ss h1 {
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
    }

    .ss p {
      color: #666;
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 10px;
    }

    .ss ol {
      margin-bottom: 20px;
      padding-left: 20px;
    }

    .ss a {
      color: #007bff;
      text-decoration: none;
    }

    .ss a:hover {
      text-decoration: underline;
    }
CSS);
?>
<div class="d-flex flex-column flex-root">
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #7EBFDB;">
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <a href="/admin" class="text-center mb-15">
                    <img src="<?= $publishedUrl . '/media/logos/logo-5.svg' ?>" alt="logo" class="h-70px" />
                </a>
                <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg text-white">Discover Amazing
                <br />Features &amp; Possibilites</h3>
            </div>
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(<?= $publishedUrl . '/media/svg/illustrations/payment.svg' ?>)"></div>
        </div>
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <?= Alert::widget() ?>
            <div class="">
               
              <div class="ss">
                   <div class="ss-container card">
                    <h1>Signup Success!</h1>
                    <p>Thank you for signing up. To complete your registration, please verify your email address by following the instructions below:</p>
                    <ol class="mt-3">
                      <li>Check your inbox for a verification email from us.</li>
                      <li>Open the email and click on the verification link provided.</li>
                      <li>If you can't find the email in your inbox, please check your spam or junk folder.</li>
                      <li>After clicking the verification link, you'll be redirected back to our website, and your account will be activated.</li>
                    </ol>
                    <p>If you encounter any issues or need further assistance, please contact our support team at <a href="mailto:developer@matt1820.org">developer@matt1820.org</a>.</p>

                    <p>
                        Didn't receive an email? <?= Html::tag('a', 'Resend Verification', [
                            'href' => Url::toRoute(['resend-email-verification', 'vt' => $user->verification_token])
                        ]) ?>
                    </p>

                  </div>
              </div>
        </div>
        
       <form id="kt_login_forgot_form"></form>
       <form id="kt_login_signin_form"></form>
       <form id="kt_login_signup_form"></form>
                
    </div>
</div>
</div>