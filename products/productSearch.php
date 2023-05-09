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
  <link rel="stylesheet" href="../assets/css/search-bar.css"/>
  <link rel="stylesheet" href="../assets/css/menu.css" />
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script> 
</head>

<body>

<?php require 'menu.php';?>
		
<div class="bg-img" >
    <center>
	<form method="post" action="productMenu.php" class="search-container">
		<h2>Select Filter</h2><br>
		<input type="text" placeholder="Search" class="search-field"> <button class="search-button" type="submit">Go</button><br>
		<label><h2 style="font-size: 120%;">List All &nbsp</h2></label><input type="radio" id="priority-low" value="all" name="priority" checked>
		<label><h2 style="font-size: 120%;">Flowers &nbsp</h2></label><input type="radio" id="priority-low" value="flower" name="priority">
		<label><h2 style="font-size: 120%;">Fruits &nbsp</h2></label><input type="radio" id="priority-normal" value="fruit" name="priority">
		<label><h2 style="font-size: 120%;"> Vegetables &nbsp</h2></label><input type="radio" id="priority-high" value="vegetable" name="priority">

	</form>
    </center>
</div>

</body>

<?php require '../includes/footer.php';?>

</html>