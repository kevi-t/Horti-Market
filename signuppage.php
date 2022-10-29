<!DOCTYPE html>
<html>
<head>
<title>Horticulture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="indexfooter.css" />
  <link rel="stylesheet" href="menu.css" />
  <script src="js2/jquery.min.js"></script>
  <script src="js2/bootstrap.min.js"></script>
</head>

<?php	require 'menu.php';?>

<body>
<div class="bg-img">
 <center>
<form action="Login/signUp.php" method='POST' class="container">
    <h2>SIGNUP</h2>
	<div class="form-group">
        <input class="form-control" type="text" name="name" id="name" value="" placeholder="Name" required/>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="uname" id="uname" value="" placeholder="Surname" required/>
    </div>
	<div class="form-group">
        <input class="form-control" type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required/>
    </div>
	<div class="form-group">
        <input class="form-control" type="email" name="email" id="email" value="" placeholder="Email" required style="width:80% ">
    </div>
    <div class="form-group">
        <input class="form-control"  type="password" name="pass" id="pass" value="" placeholder="Password" required>
    </div>
   	<input type="checkbox"onclick="myFunction()" >Show Password</br>
	<div class="form-group">
        <input class="form-control" type="text" name="addr" id="addr" value="" placeholder="Address" required/>
    </div>
	<b>Category :</b>  <input type="radio" id="farmer" name="category" value="1" class="radio" checked><label for="farmer">Farmer</label>
    <input type="radio" id="buyer" name="category" value="0" class="radio"><label for="buyer">Buyer</label></br>
	<button type="submit" class="btn" value="submit" name="submit" class="special" >Register</button>
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

<script type="text/javascript">
	function myFunction() {
    var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
        } 
		 else {
         x.type = "password";
        }
    }
</script>

</html>