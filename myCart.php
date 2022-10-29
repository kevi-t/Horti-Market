<?php
	session_start();
	require 'db.php';
    if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0)
	{
		$_SESSION['message'] = "You need to first login to access this page !!!";
		header("Location: Login/error.php");
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="indexfooter.css" />
    <link rel="stylesheet" href="menu.css" />
    <script src="js2/jquery.min.js"></script>
    <script src="js2/bootstrap.min.js"></script> 
	</head>
<?php require 'menu2.php'; ?>

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


<h2>My Cart</h2>
   <?php
     $sql = "SELECT * FROM mycart WHERE bid = '$bid'";
     $result = mysqli_query($conn, $sql);
     while($row = $result->fetch_array()):
        $pid = $row['pid'];
        $sql = "SELECT * FROM fproduct WHERE pid = '$pid'";
        $result1 = mysqli_query($conn, $sql);
        $row1 = $result1->fetch_array();
		$picDestination = "images/productImages/".$row1['pimage'];
   ?>
	<strong><h2 class="title" style="color:black; "><?php echo $row1['product'].'';?></h2></strong>
	<a href="review.php?pid=<?php echo $row1['pid'] ;?>" > <img class="image fit" src="<?php echo $picDestination;?>" alt=""  /></a>						
	<blockquote><?php echo "Type : ".$row1['pcat'].'';?><br><?php echo "Price : ".$row1['price'].' /-';?><br></blockquote>						
   <?php endwhile;	?>
</div>

</body>

<footer class="footer-distributed" style="background-color:black" id="aboutUs">
  <center><h1 style="font: 35px calibri;">About Us</h1></center>
  <div class="footer-left">
    <h3 style="font-family: 'Times New Roman', cursive;">Horticulture &copy; </h3><br />
    <p style="font-size:20px;color:white">Your product Our market !!!</p><br />
  </div>
  <div class="footer-center">
     <div><i class="fa fa-map-marker"></i><p style="font-size:20px">Horticulture Fam<span>Bungoma</span></p>  </div>
     <div><i class="fa fa-phone"></i><p style="font-size:20px">0792526394</p></div>
     <div><i class="fa fa-envelope"></i><p style="font-size:20px"><a href="mailto:agroculture@gmail.com" style="color:white">kelvin@gmail.com</a></p></div>
  </div>
  <div class="footer-right">
    <p class="footer-company-about" style="color:white"><span style="font-size:20px"><b>About Horticulture</b></span>
      Horticulture is e-commerce trading platform for Fruits,Vegetables & Flowers...
    </p>
    <div class="footer-icons">
      <a  href="#"><i style="margin-left: 0;margin-top:5px;"class="fa fa-facebook"></i></a>
      <a href="#"><i style="margin-left: 0;margin-top:5px" class="fa fa-instagram"></i></a>
      <a href="#"><i style="margin-left: 0;margin-top:5px" class="fa fa-youtube"></i></a>
    </div>
  </div>
</footer>

</html>