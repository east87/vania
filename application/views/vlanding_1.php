<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet"> 
  <link rel="icon" type="image/ico" href="<?php echo IMAGES_BASE_URL;?>/favicon.ico" sizes="16x16">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?= FRONTEND_BASE_URL; ?>/css/main.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
  crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title>Vania</title>
</head>

<body>
  <div class="index-container d-flex flex-column justify-content-center align-items-center">
      
    <div class="p-2 text-center">
      <img class="index-vania-logo" src="<?= IMAGES_BASE_URL;?>/vania-grey.png" alt="vania-grey-logo">
      <br>
      <h4 class="text-center text-warning">Under Constructions</h4>
    </div>
    <div class="p-2 text-center">
      <img class="index-vania-hero" src="<?= IMAGES_BASE_URL;?>/hero.png" alt="index-hero">
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
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
