<?php

use app\helpers\App;
use app\helpers\Url;
?>

 <div class="container">
    <div class="header">
      <h1>Email Verification</h1>
    </div>
    <div class="content">
      <p>Dear User,</p>
      <p>Thank you for signing up! To verify your email address, please click the button below:</p>
      <a style="display: inline-block; background-color: #007bff; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 4px;" class="button" href="<?= Url::toRoute(['site/email-verification', 'vt' => $user->verification_token], true) ?>">Verify Email</a>
    </div>
    <div class="footer">
      <p>If you did not create an account, please ignore this email.</p>
      <p>Regards,<br><?= App::appName() ?></p>
    </div>
  </div>