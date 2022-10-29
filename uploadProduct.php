<?php  session_start();
require 'db.php';

function dataFilter($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $productType = $_POST['type'];
   $productName = dataFilter($_POST['pname']);
   $quantity = dataFilter($_POST['quantity']);
   $productInfo = $_POST['pinfo'];
   $productPrice = dataFilter($_POST['price']);
   $fid = $_SESSION['id'];
   
   $sql = "INSERT INTO fproduct (fid, product, pcat, quantity, pinfo, price)  
                        VALUES ('$fid', '$productName', '$productType', '$quantity', '$productInfo', '$productPrice')";
   $result = mysqli_query($conn, $sql);
   if(!$result)
   {
	  $_SESSION['message'] = "Unable to upload Product !!!";
	  header("Location: Login/error.php");
   }
   else
   {
	 $_SESSION['message'] = "successfull !!!";
   }
	$pic = $_FILES['productPic'];
	$picName = $pic['name'];
	$picTmpName = $pic['tmp_name'];
	$picSize = $pic['size'];
	$picError = $pic['error'];
	$picType = $pic['type'];
	$picExt = explode('.', $picName);
	$picActualExt = strtolower(end($picExt));
	$allowed = array('jpg','jpeg','png');

	if(in_array($picActualExt, $allowed))
	{
		if($picError === 0)
		{
			$_SESSION['productPicId'] = $_SESSION['id'];
			$picNameNew = $productName.$_SESSION['productPicId'].".".$picActualExt ;
			$_SESSION['productPicName'] = $picNameNew;
			$_SESSION['productPicExt'] = $picActualExt;
			$picDestination = "images/productImages/".$picNameNew;
			move_uploaded_file($picTmpName, $picDestination);
			$id = $_SESSION['id'];
			$sql = "UPDATE fproduct SET picStatus=1, pimage='$picNameNew' WHERE product='$productName';";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
			   $_SESSION['message'] = "Product Image Uploaded successfully !!!";
			   header("Location: market.php");
			}
			else
			{
				$_SESSION['message'] = "There was an error in uploading your product Image! Please Try again!";
				header("Location: Login/error.php");
			}
		}
		else
		{
		  $_SESSION['message'] = "There was an error in uploading your product image! Please Try again!";
		  header("Location: Login/error.php");
		}
	}
	else
	{
	   $_SESSION['message'] = "You cannot upload files with this extension!!!";
	   header("Location: Login/error.php");
	}
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Horticulture</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="indexfooter.css" />
        <link rel="stylesheet" href="menu.css" />
        <script src="js2/jquery.min.js"></script>
        <script src="js2/bootstrap.min.js"></script>
	</head>

<body>

<?php require 'menu2.php'; ?>

<!-- One -->

<div class="bg-img">
<center>	
<form method="POST" action="uploadProduct.php" enctype="multipart/form-data" class="container">
 <h2>Enter the Product Information here..!!</h2><br>
<input class="form-control" type="text" name="pname" id="pname" value="" placeholder="Product Name" required />
<input class="form-control" type="text" name="price" id="price" value="" placeholder="Price" required />
<input class="form-control" type="text" name="quantity" id="quantity" value="" placeholder="Quantity" required />
<select class="form-control" name="type" id="type" style="width:80% " required >
   <option value="" style="color: black;">Choose Category</option>
   <option value="Fruit" style="color: black;">Fruit</option>
   <option value="Vegetable" style="color: black;">Vegetable</option>
   <option value="Grains" style="color: black;">Flowers</option>
</select>
<label>Choose Image<input type="file" name="productPic" required></input><br></label>
<button class="btn">Submit</button>		
</form>
</center>
</div>

</body>

<!-- Footer -->
<footer class="footer-distributed" style="background-color:black" id="aboutUs">
	<center><h1 style="font: 35px calibri;">About Us</h1></center>
	<div class="footer-left">
		<h3 style="font-family: 'Times New Roman', cursive;">Horticulture &copy; </h3><br />
		<p style="font-size:20px;color:white">Your product Our market !!!</p><br />
	</div>
	<div class="footer-center">
	   <div><i class="fa fa-map-marker"></i><p style="font-size:20px">Horticulture Fam<span>Bungoma</span></p>	</div>
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

<script>
 CKEDITOR.replace( 'pinfo' );
</script>

</html>