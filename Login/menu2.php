<?php
	if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
	{
		$loginProfile = "My Profile: ". $_SESSION['Username'];
		$logo = "glyphicon glyphicon-user";
		if($_SESSION['Category']!= 1)
		{
			$link = "profile.php";
		}
		else {
				$link = "../profileView.php";
		}
	}
	else
	{
		$loginProfile = "Login";
		$link = "../index.php";
		$logo = "glyphicon glyphicon-log-out";
	}
?>

<!DOCTYPE html>
<html>
	
<header id="header">
<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">HORTICULTURE</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
        <li><a href="../myCart.php"><span class="glyphicon glyphicon-shopping-cart"> MYCART</a></li>
        <li><a href="../market.php"><span class="glyphicon glyphicon-list-alt"></span> DIGITAL MARKET</a></li>
        <li><a href="../blogView.php"><span class="glyphicon glyphicon-comment"></span> BLOG</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	      <li><a href="<?= $link; ?>"><span class="<?php echo $logo; ?>"></span><?php echo" ". $loginProfile; ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>    
      </ul>
    </div>
  </div>
</nav>
</header>

</html>