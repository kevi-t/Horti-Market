<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Horticulture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"> 
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/footer.css" />
  <link rel="stylesheet" href="../assets/css/menu.css" />
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>    	
</head>

<?php	require 'menu.php';?>

<body>

<div class="bg-img">
 <center>
<form action="code.php" method='POST' class="container">
<div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">ADMIN LOGIN</h1>
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
              </div>
	<div class="form-group">
        <input class="form-control" type="email" name="emaill" id="email" value="" placeholder="Email" required style="width:80%">
    </div>
    <div class="form-group">
        <input class="form-control"  type="password" name="passwordd" id="pass" value="" placeholder="Password" required>
    </div>  
    	<button type="submit" value="Login" name="login_btn" class="btn">Login</button>
  </form>
</center>
</div>



</body>
<?php	require '../includes/footer.php';?>

</html>