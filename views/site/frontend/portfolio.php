<?php

use app\helpers\App;
?>

<div id="portfolio" name="portfolio">
  <div class="container">
    <div class="row">
      <h2 class="centered">What Special</h2>
      <hr>
      <div class="col-lg-8 col-lg-offset-2 centered">
        <p class="large">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
      </div>
    </div>
    <!-- /row -->
    <div class="container">
      <div class="row"> 
        
        <!-- PORTFOLIO IMAGE 1 -->
        <div class="col-md-4 ">
          <div class="grid overlay">
            <figure> <img class="img-responsive br-10" src="<?= App::publishedUrl('/img/portfolio/1.jpg', '@app/assets/frontend') ?>" alt="">
              <figcaption>
                <h5>Photo</h5>
                <a data-toggle="modal" href="#myModal" class="btn btn-default br-10">More Details</a> </figcaption>
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-overlay --> 
        </div> 
    
        
        <!-- PORTFOLIO IMAGE 2 -->
        <div class="col-md-4">
          <div class="grid overlay">
            <figure> 
              <img class="img-responsive br-10" src="<?= App::publishedUrl('/img/portfolio/2.jpg', '@app/assets/frontend') ?>" alt="">
              <figcaption>
                <h5>Photo</h5>
                <a data-toggle="modal" href="#myModal" class="btn btn-default br-10">More Details</a> </figcaption>
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-overlay --> 
        </div>
        
        <!-- PORTFOLIO IMAGE 3 -->
        <div class="col-md-4">
          <div class="grid overlay">
            <figure> 
              <img class="img-responsive br-10" src="<?= App::publishedUrl('/img/portfolio/3.jpg', '@app/assets/frontend') ?>" alt="">
              <figcaption>
                <h5>Photo</h5>
                <a data-toggle="modal" href="#myModal" class="btn btn-default br-10">More Details</a> </figcaption>
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-overlay --> 
        </div>
      </div>
      <!-- /row --> 
      
      <!-- PORTFOLIO IMAGE 4 -->
      <div class="row">
        <div class="col-md-4 ">
          <div class="grid overlay">
            <figure> <img class="img-responsive br-10" src="<?= App::publishedUrl('/img/portfolio/4.jpg', '@app/assets/frontend') ?>" alt="">
              <figcaption>
                <h5>Photo</h5>
                <a data-toggle="modal" href="#myModal" class="btn btn-default br-10">More Details</a> </figcaption>
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-overlay --> 
        </div>
        
        <!-- PORTFOLIO IMAGE 5 -->
        <div class="col-md-4">
          <div class="grid overlay">
            <figure> <img class="img-responsive br-10" src="<?= App::publishedUrl('/img/portfolio/5.jpg', '@app/assets/frontend') ?>" alt="">
              <figcaption>
                <h5>Photo</h5>
                <a data-toggle="modal" href="#myModal" class="btn btn-default br-10">More Details</a> </figcaption>
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-overlay --> 
        </div>
        
        <!-- PORTFOLIO IMAGE 6 -->
        <div class="col-md-4">
          <div class="grid overlay">
            <figure> <img class="img-responsive br-10" src="<?= App::publishedUrl('/img/portfolio/6.jpg', '@app/assets/frontend') ?>" alt="">
              <figcaption>
                <h5>Photo</h5>
                <a data-toggle="modal" href="#myModal" class="btn btn-default br-10">More Details</a> </figcaption>
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-overlay --> 
        </div>
        <!-- /col --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /row --> 
  </div>
</div>