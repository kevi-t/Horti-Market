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
	<form class="container3" method="post" action="productMenu.php">
	   <h2>Select Filter</h2>
	   <div class="search-container">
	        <!--<input class="search-input" type="text" name="pname" id="pname" value="" placeholder="Search"/>
			<button class="search-button" type="submit">Go</button>
			<input type="radio" id="priority-low" value="all" name="priority" checked>
			<label for="priority-low"><h2 style="font-size: 120%;">List All</h2></label>
			<input type="radio" id="priority-low" value="flower" name="priority" checked>
			<label for="priority-low"><h2 style="font-size: 120%;">Flowers</h2></label>
			<input type="radio" id="priority-normal" value="fruit" name="priority">
			<label for="priority-normal"><h2 style="font-size: 120%;">Fruits</h2></label>
			<input type="radio" id="priority-high" value="vegetable" name="priority">
			<label for="priority-high"><h2 style="font-size: 120%;"> Vegetables</h2></label>-->
			
	   </div>

	</form>
    </center>
</div>

</body>

<?php require '../includes/footer.php';?>

</html>