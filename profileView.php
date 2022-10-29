<?php
    session_start();

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: Login/error.php");
	}
?>

<!DOCTYPE HTML>

<html lang="en">
    <head>
        <title>Profile: <?php echo $_SESSION['Username']; ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="indexfooter.css" />
        <link rel="stylesheet" href="menu.css" />
        <script src="js2/jquery.min.js"></script>
        <script src="js2/bootstrap.min.js"></script> 

    </head>


<body>

<?php  require 'menu2.php'; ?>

<div class="bg-img">
 <center>
<form class="container">       
    <header>
    <center>
       <span><img src="<?php echo 'images/profileImages/'.$_SESSION['picName'].'?'.mt_rand(); ?>" class="image-circle" class="img-responsive" height="100%"></span><br>
       <h2><?php echo $_SESSION['Name'];?> <?php echo $_SESSION['Username'];?></h2>
    </center>
    </header>
    <p>
    <b><font size="+1" color="black">Email ID : </font></b><font size="+1"><?php echo $_SESSION['Email'];?></font> <br />         
    <b><font size="+1" color="black">Mobile No : </font></b> <font size="+1"><?php echo $_SESSION['Mobile'];?></font><br />                 
    <b><font size="+1" color="black">ADDRESS : </font></b> <font size="+1"><?php echo $_SESSION['Addr'];?></font><br /> 
    <b><font size="+1" color="black">RATINGS : </font></b><font size="+1"><?php echo $_SESSION['Rating'];?></font><br> </p>              
    <div class="12u$">
        <center>
        <div class="row uniform">
          <div class="3u 12u$(large)"><a href="Profile/changePass.php" class="btn btn-danger" style="text-decoration: none;">Change Password</a></div>
          <div class="3u 12u$(large)"><a href="profileEdit.php" class="btn btn-danger" style="text-decoration: none;">Edit Profile</a></div>
          <div class="3u 12u$(xsmall)"><a href="uploadProduct.php" class="btn btn-danger" style="text-decoration: none;">Upload Product</a></div>                        
        </div>
        </center>
    </div>               
     
</form>
</center>
</div>
 
</body>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>            
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

<footer class="footer-distributed" style="background-color:black" id="aboutUs">
  <center><h1 style="font: 35px calibri;">About Us</h1></center>
  <div class="footer-left">
    <h3 style="font-family: 'Times New Roman', cursive;">Horticulture &copy; </h3><br />
    <p style="font-size:20px;color:white">Your product Our market !!!</p><br />
  </div>
  <div class="footer-center">
     <div><i class="fa fa-map-marker"></i><p style="font-size:20px">Horticulture Fam<span>Bungoma</span></p>  </div>
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