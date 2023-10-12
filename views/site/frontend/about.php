<?php

use app\helpers\App;
?> 
<div id="about" name="about">
  <div class="container">
    <div class="row white">
      <h2 class="centered">About Us</h2>
      <hr>
      <div class="col-md-6 d-flex justify-content-center"> 
        <img class="img-responsive br-10 mh-400" src="<?= App::publishedUrl('/img/about/1.jpg', '@app/assets/frontend') ?>"  align=""/>
      </div>
      <div class="col-md-6">
        <h3>Who we are</h3>
        <p>Lorem ipsum dolor sit amet, quo meis audire placerat eu, te eos porro veniam. An everti maiorum detracto mea. Eu eos dicam voluptaria, erant bonorum albucius et per, ei sapientem accommodare est. Saepe dolorum constituam ei vel. Te sit malorum ceteros repudiandae, ne tritani adipisci vis.</p>
        <h3>Why choose us?</h3>
        <p>Lorem ipsum dolor sit amet, quo meis audire placerat eu, te eos porro veniam. An everti maiorum detracto mea. Eu eos dicam voluptaria, erant bonorum albucius et per, ei sapientem accommodare est. Saepe dolorum constituam ei vel.</p>
      </div>
    </div>
    <!-- row --> 
  </div>
</div>