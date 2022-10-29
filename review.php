<?php session_start();
require 'db.php';
$pid = $_GET['pid'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>Horticulture: Product</title>
	<meta lang="eng">
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="indexfooter.css" />
    <link rel="stylesheet" href="menu.css" />
    <script src="js2/jquery.min.js"></script>
    <script src="js2/bootstrap.min.js"></script> 
</head>

<body>

<?php require 'menu2.php';?>
<div class="cont">
<?php
	$sql="SELECT * FROM fproduct WHERE pid = '$pid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$fid = $row['fid'];
	$sql = "SELECT * FROM farmer WHERE fid = '$fid'";
	$result = mysqli_query($conn, $sql);
	$frow = mysqli_fetch_assoc($result);
	$picDestination = "images/productImages/".$row['pimage'];
?>		
<img class="image fit" src="<?php echo $picDestination.'';?>" alt="" />
<!-- Image of farmer-->
	<p style="font: 50px Times new roman;"><?= $row['product']; ?></p>
	<p style="font: 30px Times new roman;">Product Owner : <?= $frow['fname']; ?></p>
	<p style="font: 30px Times new roman;">Price : <?= $row['price'].' Ksh'; ?></p>					
<div class="col-12 col-sm-12" style="font: 25px Times new roman;"><?= $row['pinfo']; ?></div>							
<a href="myCart.php?flag=1&pid=<?= $pid; ?>"  style="text-decoration: none;"><span class="glyphicon glyphicon-shopping-cart"> AddToCart</a>
<a href="buyNow.php?pid=<?= $pid; ?>"  style="text-decoration: none;">Buy Now</a>
<h1>Product Reviews</h1>
	<?php
		$sql = "SELECT * FROM review WHERE pid='$pid'";
		$result = mysqli_query($conn, $sql);
	?>	
	<?php
		if($result) :
			while($row1 = $result->fetch_array()) :
	?>
<em style="color: black;"><?= $row1['comment']; ?></em>
<em style="color: black;"><?php echo "Rating : ".$row1['rating'].' out of 10';?></em>
<span class="time-right" style="color: black;"><?php echo "From: ".$row1['name']; ?></span>
	<?php endwhile; endif;?>
	<?php		?>
<p style="font: 20px Times new roman; align: left;">Rate this product</p>
<form method="POST" action="reviewInput.php?pid=<?= $pid; ?>">
<textarea style="background-color:white;color: black;" cols="5" name="comment" placeholder="Write a review"></textarea>
Rating: <input type="number" min="0" max="10" name="rating" value="0"/><input type="submit" />
</form>
</div>

</body>

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