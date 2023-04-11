<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Horticulture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/8fd23289ed.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/footer.css" />
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>

  
<?php require 'includes/menu.php'; ?>


<div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active" >
        <img src="Assets/images/bgimage.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Sell $</h3>
          <p>Money Money.</p>
        </div>      
      </div>

      <div class="item">
        <img src="Assets/images/display.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>More Sell $</h3>
          <p>Market your products...</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center">    
  <h3>Digital Market for Selling Horticulture farm produce</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="Assets/images/display2.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p>Fresh Fruits and Vegetables</p>
    </div>
    <div class="col-sm-4"> 
      <img src="Assets/images/regimage.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p> Horticulture Farmer </p>    
    </div>
    <div class="col-sm-4">
      <div class="well">
       <p>Horticulture is e-commerce trading platform for Fruits,Vegetables & Flowers...</p>
      </div>
      <div class="well">
       <p>Explore the new way of trading... by Registering with us</p>
      </div>
    </div>
  </div>
</div><br>

</body>

<?php require 'includes/footer.php'; ?>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      overflow: hidden;
      margin-bottom: 0;
      border-radius: 0;
      padding: 5px;
    }
    
    .button {
      background-color: green;
    }
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #000000;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      height: auto;
      
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>

</html>