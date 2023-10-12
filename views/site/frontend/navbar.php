<?php

use app\helpers\App;
use app\helpers\Url;
?>

<div id="navbar-main"> 
  <!-- Fixed navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
	 
      <div class="navbar-header">
	   <div class="pull-left logo">
        <a class="" href="#home">
          <img class="img-logo" src="<?= Url::image(App::setting('image')->primary_logo) ?>" />
        </a>
       </div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">
          <li><a href="#home-section" class="page-scroll">Welcome</a></li>
          <li> <a href="#about" class="page-scroll"> About Us</a></li>
          <li> <a href="#portfolio" class="page-scroll"> Special</a></li>
          <li> <a href="#services" class="page-scroll">We Offer</a></li>		  
          <li> <a href="#team" class="page-scroll"> Team</a></li>
          <li> <a href="#contact" class="page-scroll"> Get In Touch</a></li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>