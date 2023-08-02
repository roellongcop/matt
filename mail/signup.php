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

      <p>Thank you for registering with us! Before you can start using your new account, we need to make sure this email address belongs to you.</p>
      <p>Please verify your email address by clicking on the link below:</p>

      <a style="display: inline-block; background-color: #007bff; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 4px;" class="button" href="<?= Url::toRoute(['/site/email-verification', 'vt' => $user->verification_token], true) ?>">Verify Email</a>
    </div>
      <p>Once verified, you'll have full access to all features of our platform. If you didn't request this, please ignore this email.</p>
      <p>Thank you for joining our community. We're thrilled to have you onboard!</p>
    <div class="footer">
      <p></p>
      <p></p>
      <p style="color: #999999;">
        <br>sent via <?= Url::home(true) ?>
      </p>
    </div>
  </div>