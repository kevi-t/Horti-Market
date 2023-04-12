<?php
	session_start();
	$_SESSION['logged_in'] = false;
	session_unset();
	session_destroy();
?>

<!DOCTYPE html>
<html >
  <head>
  <title>Horticulture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" href="indexfooter.css" />
  <link rel="stylesheet" href="menu.css" />
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  </head>

<body>

<?php require '../includes/menu.php'; ?>

<div class="bg-img">
<center> 
<div class="container">
    <h2>Thanks for visiting !!!</h2>
    <p>You have been succesfully logged out !!!</p>
    <div><br /><a href="../index.php" class="btn">HOME</a></div>       
</div>
</center>  
</div>
</body>

<?php require '../includes/footer.php';?>

</html>