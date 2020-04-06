<!DOCTYPE html>
<html lang="en" class="no-js">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="<?= FRONTEND_BASE_URL; ?>/css/normalize.css" />
      <link rel="stylesheet" type="text/css" href="<?= FRONTEND_BASE_URL; ?>/css/mockup4.css" />
      <script src="<?= FRONTEND_BASE_URL; ?>/js/modernizr.custom.js"></script>
      <link rel="icon" type="image/ico" href="<?php echo IMAGES_BASE_URL;?>/favicon.ico" sizes="16x16">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" media="screen" href="<?= FRONTEND_BASE_URL; ?>/css/main.css" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
         crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   </head>
   <body class="demo-4">
      <div class="index-container d-flex flex-column justify-content-center align-items-center">
         <div class="text-center">
            <img class="index-vania-logo" src="<?= IMAGES_BASE_URL;?>/vania-grey.png" alt="vania-grey-logo">
         </div>
         <div class="container">
            <div id="wrap" class="wrap">
               <div class="mockup">
                  <div class="mobile">
                     <ul id="slideshow-1" class="slideshow">
                        <?php
                           if($countSmall > 0){
                            $i=0;
                             foreach($ListSmall as $ls){  $i++;  
                           ?>
                        <li class="slideshow__item slide_small"><img src="<?= html_entity_decode(contentValue($ls, 'images'));?>"/></li>
                        <?php }}?>
                     </ul>
                  </div>
                  <div class="screen">
                     <ul id="slideshow-2" class="slideshow">
                        <?php
                           if($countLarge > 0){
                            $i=0;
                             foreach($ListLarge as $ls){  $i++;  
                           ?>
                        <li class="slideshow__item slide_large <?php if( $i == 1){ echo 'current' ;}?>"><img src="<?= html_entity_decode(contentValue($ls, 'images'));?>"/></li>
                        <?php }}?>
                     </ul>
                  </div>
                  <img class="mockup__img" src="<?= IMAGES_BASE_URL;?>/landing.png" />	
               </div>
            </div>
            <div class="index-link-container container">
               <div class="row">
                  <div class="col-md-6 col-6 text-center">
                     <div id="indexLinktoRetail" class="col-md-12 col-12 index-button-bordered">
                        <div class="index-button-greeter">RETAIL</div>
                     </div>
                  </div>
                  <div class="col-md-6 col-6 text-center">
                     <div id="indexLinktoContract" class="col-md-12 col-12 index-button-bordered">
                        <div class="index-button-greeter">CONTRACT</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /container -->
      <script src="<?= FRONTEND_BASE_URL; ?>/js/classie.js"></script>
      <script src="<?= FRONTEND_BASE_URL; ?>/js/landing.js"></script>
      <script>
         (function() {
         	new Slideshow( document.getElementById( 'slideshow-1' ) );
         	setTimeout( function() {
         		new Slideshow( document.getElementById( 'slideshow-2' ) );
         	}, 1750 );
         
         	/* Mockup responsiveness */
         	var body = docElem = window.document.documentElement,
         		wrap = document.getElementById( 'wrap' ),
         		mockup = wrap.querySelector( '.mockup' ),
         		mockupWidth = mockup.offsetWidth;
         
         	scaleMockup();
         
         	function scaleMockup() {
         		var wrapWidth = wrap.offsetWidth,
         			val = wrapWidth / mockupWidth;
         
         		mockup.style.transform = 'scale3d(' + val + ', ' + val + ', 1)';
         	}
         	
         	window.addEventListener( 'resize', resizeHandler );
         
         	function resizeHandler() {
         		function delayed() {
         			resize();
         			resizeTimeout = null;
         		}
         		if ( typeof resizeTimeout != 'undefined' ) {
         			clearTimeout( resizeTimeout );
         		}
         		resizeTimeout = setTimeout( delayed, 50 );
         	}
         
         	function resize() {
         		scaleMockup();
         	}
         })();
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
         crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
         crossorigin="anonymous"></script>
      <script src="<?= FRONTEND_BASE_URL; ?>/js/main.js"></script>
      <script src="<?php echo FRONTEND_BASE_URL?>/js/jquery.validate.min.js"></script>
      <script src="<?php echo FRONTEND_BASE_URL; ?>/js/scriptForm.js"></script>
      <script>
         $(document).ready(function () {
           $('#indexLinktoRetail').click(function(){
             window.location.href='https://devretail.vania.id';
           });
           
           $('#indexLinktoContract').click(function(){
             window.location.href='https://devcontract.vania.id';
           });
         
         });
      </script>
   </body>
</html>