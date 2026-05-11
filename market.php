<?php
 	session_start();
	require 'database/db.php';
	if(!isset($_SESSION['logged_in']) OR !$_SESSION['logged_in'])
	{
		header("Location: loginpage.php");
		exit;
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

<?php if ($search !== ''): ?>
  <p style="width:100%;padding:10px 0 0 10px;color:#333;font-weight:600;">
    <?= $count ?> result<?= $count !== 1 ? 's' : '' ?> for &ldquo;<?= htmlspecialchars($search) ?>&rdquo;
    &nbsp;<a href="market.php">Clear</a>
  </p>
<?php endif; ?>

<?php
  $search = isset($_GET['search']) ? trim($_GET['search']) : '';

  if ($search !== '') {
    $s = mysqli_real_escape_string($conn, $search);
    $sql = "SELECT * FROM fproduct WHERE product LIKE '%$s%' OR pcat LIKE '%$s%'";
  } elseif (!isset($_GET['type']) || $_GET['type'] === 'all') {
    $sql = "SELECT * FROM fproduct WHERE 1";
  } elseif ($_GET['type'] === 'fruit') {
    $sql = "SELECT * FROM fproduct WHERE pcat = 'Fruit'";
  } elseif ($_GET['type'] === 'vegetable') {
    $sql = "SELECT * FROM fproduct WHERE pcat = 'Vegetable'";
  } elseif ($_GET['type'] === 'grain') {
    $sql = "SELECT * FROM fproduct WHERE pcat = 'Grains'";
  } elseif ($_GET['type'] === 'flower') {
    $sql = "SELECT * FROM fproduct WHERE pcat = 'Flowers'";
  } else {
    $sql = "SELECT * FROM fproduct WHERE 1";
  }

  $result = mysqli_query($conn, $sql);
  $count  = mysqli_num_rows($result);
?>
<?php if ($count === 0): ?>
  <p style="width:100%;padding:20px;color:#666;">No products found.</p>
<?php endif; ?>

<?php while($row = $result->fetch_array()):
   $picDestination = "assets/images/productImages/".$row['pimage'];
?>
        <div class="product-card">
          <a href="products/review.php?pid=<?= $row['pid'] ?>"><img src="<?= $picDestination ?>"/></a>
          <h3><?= htmlspecialchars($row['product']) ?></h3>
          <p>
            Type : <?= htmlspecialchars($row['pcat']) ?><br>
            Price : <?= htmlspecialchars($row['price']) ?> Ksh<br>
            Quantity : <?= htmlspecialchars($row['quantity']) ?> Kg
          </p>
          <div class="button-container">
            <a href="products/buyNow.php?pid=<?= $row['pid'] ?>"><button>Buy</button></a>
            <a href="myCart.php?flag=1&pid=<?= $row['pid'] ?>"><button>Cart</button></a>
          </div>
        </div>
<?php endwhile; ?>
</div>

  						
</body>

<?php require 'includes/footer.php'; ?>

</html>