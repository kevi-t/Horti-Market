<?php
	session_start();
	$_SESSION['logged_in'] = false;
	session_unset();
	session_destroy();
?>

<!DOCTYPE html>
<html >
  <head>
  <title>Horticulture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" href="indexfooter.css" />
  <link rel="stylesheet" href="menu.css" />
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  </head>

<body>
<?php require 'menu.php'; ?>
<div class="bg-img">
<center> 
<div class="container">
    <h2>Thanks for visiting !!!</h2>
    <p>You have been succesfully logged out !!!</p>
    <div class="6u 12u$(xsmall)"><br /><a href="../index.php" class="btn">HOME</a></div>       
</div>
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