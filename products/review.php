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
  <link rel="stylesheet" href="../assets/css/review.css" />
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script> 
</head>

<body>

<?php require 'menu.php';?>

<div class="product-grid">

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

<div class="product-card">	
    <img src="<?php echo $picDestination.'';?>" alt="" />
    <h2><?= $row['product']; ?></h2>
	<p>
	   Product Owner :<br><br>
	   Price : <?= $row['price'].' Ksh'; ?><br><br>
	   Quantity : <?= $row['quantity'].' Kg'; ?><br><br>
	</p>
	<div class="button-container">
		<div class="product-button"><a href="../myCart.php?flag=1&pid=<?= $pid; ?>">Add</a></div>
		<div class="product-button"><a href="buyNow.php?pid=<?= $pid; ?>">Buy</a></div>	
    </div>				
</div>

<div class="product-card">
	<h1>Product Reviews</h1>
	<?php
		$sql = "SELECT * FROM review WHERE pid='$pid'";
		$result = mysqli_query($conn, $sql);
	?>	
	<?php
		if($result) :
			while($row1 = $result->fetch_array()) :
	?>
	<p>
	   <?= $row1['comment']; ?>
	   <?php echo "Rating : ".$row1['rating'].' out of 10';?>
	   <?php echo "From: ".$row1['name']; ?></span>	<?php endwhile; endif;?><br>
	   <h3> Rate this product</h3><br>
	</p>
    <form class="container2" method="POST" action="reviewInput.php?pid=<?= $pid; ?>">
	   <br><br>&nbsp  &nbsp &nbsp  &nbsp <textarea placeholder="Write a review"></textarea>
       &nbsp  &nbsp &nbsp  &nbsp Rating:<input type="number" min="0" max="10" name="rating" value="0"/><br>
	   <br>&nbsp  &nbsp &nbsp  &nbsp<button class="btn2">submit</button>
     </form>
</div>

</div>
</body>

<?php require '../includes/footer.php';?>

</html>