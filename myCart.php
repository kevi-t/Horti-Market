<?php
	session_start();
	require 'database/db.php';
    if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0)
	{
		$_SESSION['message'] = "You need to first login to access this page !!!";
		header("Location: authenticate/error.php");
	}
    $bid = $_SESSION['id'];
    if(isset($_GET['flag']))
    {
        $pid = $_GET['pid'];

        $sql = "INSERT INTO mycart (bid,pid)
               VALUES ('$bid', '$pid')";
        $result = mysqli_query($conn, $sql);
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> 
	</head>
<?php require 'includes/menu2.php'; ?>

<body>

<div class="cont">

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

<div class="product">
	<a href="products/review.php?pid=<?php echo $row1['pid'] ;?>" > <img src="<?php echo $picDestination;?>" alt=""/></a>
  <h2><?php echo $row1['product'].'';?></h2>
  <p>
     <?php echo "Type : ".$row1['pcat'].'';?><br>
     <?php echo "Price : ".$row1['price'].'Ksh';?><br>
     <?php echo "Quantity : ".$row1['quantity'].'Kg';?>
  </p>											
</div>

<?php endwhile;	?>

</div>

</body>

<?php	require 'includes/footer.php';?>

</html>