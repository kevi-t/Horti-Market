<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Horticulture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../indexfooter.css" />
  <link rel="stylesheet" href="../menu.css" />
  <script src="../js2/jquery.min.js"></script>
  <script src="../js2/bootstrap.min.js"></script>    	
</head>

<?php	require 'menu.php';?>

<body>

<div class="bg-img">
 <center>
<form action="code.php" method='POST' class="container">
<div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">ADMIN LOGIN</h1>
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
              </div>
	<div class="form-group">
        <input class="form-control" type="email" name="emaill" id="email" value="" placeholder="Email" required style="width:80%">
    </div>
    <div class="form-group">
        <input class="form-control"  type="password" name="passwordd" id="pass" value="" placeholder="Password" required>
    </div>  
    	<button type="submit" value="Login" name="login_btn" class="btn">Login</button>
  </form>
</center>
</div>



</body>
<!-- Footer -->
<footer class="footer-distributed" style="background-color:black" id="aboutUs">
	<center><h1 style="font: 35px calibri;">About Us</h1></center>
	<div class="footer-left">
		<h3 style="font-family: 'Times New Roman', cursive;">Horticulture &copy; </h3><br />
		<p style="font-size:20px;color:white">Your product Our market !!!</p><br />
	</div>
	<div class="footer-center">
	   <div><i class="fa fa-map-marker"></i><p style="font-size:20px">Horticulture Fam<span>Bungoma</span></p>	</div>
	   <div><i class="fa fa-phone"></i><p style="font-size:20px">0792526394</p></div>
	   <div><i class="fa fa-envelope"></i><p style="font-size:20px"><a href="mailto:agroculture@gmail.com" style="color:white">kelvin@gmail.com</a></p></div>
	</div>
	<div class="footer-right">
		<p class="footer-company-about" style="color:white"><span style="font-size:20px"><b>About Horticulture</b></span>
			Horticulture is e-commerce trading platform for Fruits,Vegetables & Flowers...
		</p>
		<div class="footer-icons">
			<a  href="#"><i style="margin-left: 0;margin-top:5px;"class="fa fa-facebook"></i></a>
			<a href="#"><i style="margin-left: 0;margin-top:5px" class="fa fa-instagram"></i></a>
			<a href="#"><i style="margin-left: 0;margin-top:5px" class="fa fa-youtube"></i></a>
		</div>
	</div>

</footer>

</html>