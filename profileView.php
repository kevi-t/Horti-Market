<?php
    session_start();

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] != 1)
	{
		$_SESSION['message'] = "You have to Login to view this page!";
		header("Location: authenticate/error.php");
	}
?>

<!DOCTYPE HTML>

<html lang="en">
    <head>
        <title>Profile: <?php echo $_SESSION['Username']; ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/footer.css"/>
        <link rel="stylesheet" href="assets/css/menu.css" />
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script> 

    </head>


<body>

<?php  require 'includes/menu2.php'; ?>

<div class="bg-img">
 <center>
<form class="container">       
    <header>
    <center>
       <span><img src="<?php echo 'assets/images/profileImages/'.$_SESSION['picName'].'?'.mt_rand(); ?>" class="image-circle" class="img-responsive" height="150px"></span><br>
       <h2><?php echo $_SESSION['Name'];?> <?php echo $_SESSION['Username'];?></h2>
    </center>
    </header>
    <p>
    <b><font size="+1" color="black">Email ID : </font></b><font size="+1"><?php echo $_SESSION['Email'];?></font> <br />         
    <b><font size="+1" color="black">Mobile No : </font></b> <font size="+1"><?php echo $_SESSION['Mobile'];?></font><br />                 
    <b><font size="+1" color="black">ADDRESS : </font></b> <font size="+1"><?php echo $_SESSION['Addr'];?></font><br /> 
    <b><font size="+1" color="black">RATINGS : </font></b><font size="+1"><?php echo $_SESSION['Rating'];?></font><br> </p>              
    <div class="12u$">
        <center>
        <div class="row uniform">
          <div class="3u 12u$(large)"><a href="profiles/changePassword.php" class="btn btn-danger" style="text-decoration: none;">Change Password</a></div>
          <div class="3u 12u$(large)"><a href="profiles/profileEdit.php" class="btn btn-danger" style="text-decoration: none;">Edit Profile</a></div>
          <div class="3u 12u$(xsmall)"><a href="products/uploadProduct.php" class="btn btn-danger" style="text-decoration: none;">Upload Product</a></div>                        
        </div>
        </center>
    </div>               
     
</form>
</center>
</div>
 
</body>

<?php  require 'includes/footer.php';?>

</html>