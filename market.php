<?php
 	session_start();
	require 'database/db.php';
	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0)
	{
		$_SESSION['message'] = "You need to first login to access this page !!!";
		header("Location: authenticate/error.php");
	}

 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Horticulture</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/8fd23289ed.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/footer.css"/>
        <link rel="stylesheet" href="assets/css/menu.css">
        <!-- <link rel="stylesheet" href="assets/css/product.css"> -->
        <link rel="stylesheet" href="assets/css/product1.css">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>   
    </head>

<?php require 'includes/menu2.php'; ?>
	
<body>

<div class="product-container">
  			
<?php
  if(!isset($_GET['type']) OR $_GET['type'] == "all")
   {
	  $sql = "SELECT * FROM fproduct WHERE 1";
   }
  if(isset($_GET['type']) AND $_GET['type'] == "fruit")
  {
   $sql = "SELECT * FROM fproduct WHERE pcat = 'Fruit'";
  }
  if(isset($_GET['type']) AND $_GET['type'] == "vegetable")
  {
    $sql = "SELECT * FROM fproduct WHERE pcat = 'Vegetable'";
  }
  if(isset($_GET['type']) AND $_GET['type'] == "grain")
  {
	 $sql = "SELECT * FROM fproduct WHERE pcat = 'Grains'";
  }
  $result = mysqli_query($conn, $sql);
?>
<?php
   while($row = $result->fetch_array()):
   $picDestination = "assets/images/productImages/".$row['pimage'];
?>	
        <div class="product-card">
          <a href="products/review.php?pid=<?php echo $row['pid'] ;?>"><img src="<?php echo $picDestination;?>"/></a>
          <h3><?php echo $row['product'].'';?></h3>
          <p>
            <?php echo "Type : ".$row['pcat'].'';?><br>
            <?php echo "Price : ".$row['price'].' Ksh';?><br>
            <?php echo "Quantity : ".$row['quantity'].' Kg';?>
          </p>
          <div class="button-container">
            <button onclick="buyNow()">Buy</button>
            <button onclick="addToCart()">Cart</button>
           </div>
        </div>
        <?php endwhile;	?>
</div>

  						
</body>

<?php require 'includes/footer.php'; ?>

</html>