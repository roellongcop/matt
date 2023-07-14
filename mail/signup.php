<?php

use app\helpers\Url;
?>

 <div class="container">
    <div class="header">
      <h1>Email Verification</h1>
    </div>
    <div class="content">
      <p>Dear User,</p>
      <p>Thank you for signing up! To verify your email address, please click the button below:</p>
      <a class="button" href="<?= Url::toRoute(['site/email-verfication', 'vt' => $user->verification_token]) ?>">Verify Email</a>
    </div>
    <div class="footer">
      <p>If you did not create an account, please ignore this email.</p>
      <p>Regards,<br>Your Company</p>
    </div>
  </div>