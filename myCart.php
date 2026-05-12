<?php
	session_start();
	require 'database/db.php';
    if(!isset($_SESSION['logged_in']) OR !$_SESSION['logged_in'])
	{
		header("Location: loginpage.php");
		exit;
	}
    $bid = $_SESSION['id'];
    if(isset($_GET['flag']))
    {
        $pid = (int)$_GET['pid'];
        $sql = "INSERT INTO mycart (bid,pid) VALUES ('$bid', '$pid')";
        mysqli_query($conn, $sql);
    }
    if(isset($_GET['remove']))
    {
        $pid = (int)$_GET['pid'];
        $sql = "DELETE FROM mycart WHERE bid='$bid' AND pid='$pid'";
        mysqli_query($conn, $sql);
    }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Horticulture: My Cart</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/menu.css" />
    <link rel="stylesheet" href="assets/css/product1.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> 
	</head>
<body>

<?php require 'includes/menu2.php'; ?>

<div class="product-container">

<!-- <div class="product-grid"> -->

<?php
  
  function dataFilter($data)
  {
    $data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }
?>

<?php
  $sql = "SELECT * FROM mycart WHERE bid = '$bid'";
  $result = mysqli_query($conn, $sql);
  while($row = $result->fetch_array()):
    $pid = $row['pid'];
    $sql = "SELECT * FROM fproduct WHERE pid = '$pid'";
    $result1 = mysqli_query($conn, $sql);
    $row1 = $result1->fetch_array();
		$picDestination = "assets/images/productImages/".$row1['pimage'];
?>

<div class="product-card">
	<a href="products/review.php?pid=<?php echo $row1['pid'] ;?>" > <img src="<?php echo $picDestination;?>" alt=""/></a>
  <h2><?php echo $row1['product'].'';?></h2>
  <p>
     <?php echo "Type : ".$row1['pcat'].'';?><br>
     <?php echo "Price : ".$row1['price'].'Ksh';?><br>
     <?php echo "Quantity : ".$row1['quantity'].'Kg';?>
  </p>		

  <div class="button-container">
    <a href="products/buyNow.php?pid=<?= $row1['pid'] ?>"><button>Buy</button></a>
    <a href="myCart.php?remove=1&pid=<?= $row1['pid'] ?>"><button>Remove</button></a>
  </div>			

</div>

<?php endwhile;	?>

</div>

</body>

<?php	require 'includes/footer.php';?>

</html>