<?php 
    session_start();
    require '../database/db.php';
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
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/footer.css"/>
  <link rel="stylesheet" href="../assets/css/menu.css" />
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script> 
</head>

<body>

<?php require 'menu.php';?>

<div class="cont">
<?php
	$sql="SELECT * FROM fproduct WHERE pid = '$pid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$fid = $row['fid'];
	$sql = "SELECT * FROM farmer WHERE fid = '$fid'";
	$result = mysqli_query($conn, $sql);
	$frow = mysqli_fetch_assoc($result);
	$picDestination = "../assets/images/productImages/".$row['pimage'];
?>	
<div class="product">	
<img class="image fit" src="<?php echo $picDestination.'';?>" alt="" />
<p style="font: 45px Times new roman;"><?= $row['product']; ?></p>
<p style="font: 25px Times new roman;">Product Owner : </p>
<p style="font: 25px Times new roman;">Price : <?= $row['price'].' Ksh'; ?></p>	
<ul>
<li> <a href="../myCart.php?flag=1&pid=<?= $pid; ?>"> Add</a> </li>
<li> <a href="buyNow.php?pid=<?= $pid; ?>">Buy Now</a> </li>
</ul>						
</div>

<div class="product">
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
<span class="time-right" style="color: black;"><?php echo "From: ".$row1['name']; ?></span>	<?php endwhile; endif;?>
<p style="font: 20px Times new roman; align: left;">Rate this product</p>
<form  method="POST" action="reviewInput.php?pid=<?= $pid; ?>">
    <textarea style="background-color:white;color: black;" cols="5" name="comment" placeholder="Write a review"></textarea>
    Rating: <input type="number" min="0" max="10" name="rating" value="0"/><input type="submit" />
</form>
</div>


</div>
</body>

<?php require '../includes/footer.php';?>

</html>