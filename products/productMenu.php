<?php
	session_start();
	require '../database/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Horticulture: Product Search</title>
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

<body class>

<?php require 'menu.php';?>

<?php
	function dataFilter($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<div class="cont">

<?php
	if(!isset($_GET['type']) OR $_GET['type'] == "all")
	{
	 	$sql = "SELECT * FROM fproduct WHERE 1";
	}
   elseif(isset($_GET['type']) AND $_GET['type'] == "fruit")
	{
		$sql = "SELECT * FROM fproduct WHERE pcat = 'Fruit'";
	}
	elseif(isset($_GET['type']) AND $_GET['type'] == "vegetable")
	{
		$sql = "SELECT * FROM fproduct WHERE pcat = 'Vegetable'";
	}
	elseif(isset($_GET['type']) AND $_GET['type'] == "flower")
	{
		$sql = "SELECT * FROM fproduct WHERE pcat = 'Flowers'";
	}
	else{
		echo"please select category";
	}
	$result = mysqli_query($conn, $sql);
?>

<?php
	while($row = $result->fetch_array()):
	$picDestination = "../assets/images/productImages/".$row['pimage'];
?>

<div class="product">
    <strong><h2 class="title" style="color:black; "><?php echo $row['product'].'';?></h2></strong>
	<a href="review.php?pid=<?php echo $row['pid'] ;?>" > <img class="image fit" src="<?php echo $picDestination;?>" height="220px;"  /></a>
	<blockquote><?php echo "Type : ".$row['pcat'].'';?><br><?php echo "Price : ".$row['price'].' /-';?><br></blockquote>
	<?php echo "Quantity : ".$row['quantity'].' Kg';?></blockquote>	
</div>

<?php endwhile;	?>			

</div>
</body>

<?php require '../includes/footer.php';?>

</html>