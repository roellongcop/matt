<?php

use yii\helpers\Html;
?>

<section class="hero-section section">  
  <div class="container">
      <div class="highlight tb">
          <div class="tb-cell">
              <p>Explore exclusive content and personalized experiences in our special section. Sign up now to unlock a world of benefits tailored just for you. Stay connected, stay informed, and make the most of every moment with us.</p>
          </div>
          <div class="links tb-cell">
              <div class="reservation-link">
                <?= Html::a('register here', ['signup'], [
                  'class' => 'btn reservation-btn'
                ]) ?>
              </div> 
          </div>
      </div>
  </div>
    
</section>
<div class="div-pattern"></div>