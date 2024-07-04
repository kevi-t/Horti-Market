<?php  session_start();
require '../database/db.php';

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
   
   $sql = "INSERT INTO fproduct (fid, product, pcat, quantity, pinfo, price) VALUES ('$fid', '$productName', '$productType', '$quantity', '$productInfo', '$productPrice')";
   $result = mysqli_query($conn, $sql);
   if(!$result)
   {
	  $_SESSION['message'] = "Unable to upload Product !!!";
	  header("Location: ../authenticate/error.php");
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
			$picDestination = "../assets/images/productImages/".$picNameNew;
			move_uploaded_file($picTmpName, $picDestination);
			$id = $_SESSION['id'];
			$sql = "UPDATE fproduct SET picStatus=1, pimage='$picNameNew' WHERE product='$productName';";
			$result = mysqli_query($conn, $sql);
			if($result)
			{
			   $_SESSION['message'] = "Product Image Uploaded successfully !!!";
			   header("Location: ../market.php");
			}
			else
			{
				$_SESSION['message'] = "There was an error in uploading your product Image! Please Try again!";
				header("Location: ../authenticate/error.php");
			}
		}
		else
		{
		  $_SESSION['message'] = "There was an error in uploading your product image! Please Try again!";
		  header("Location: ../authenticate/error.php");
		}
	}
	else
	{
	   $_SESSION['message'] = "You cannot upload files with this extension!!!";
	   header("Location: ../authenticate/error.php");
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
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/footer.css"/>
        <link rel="stylesheet" href="../assets/css/menu.css" />
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script> 
	</head>

<body>

<?php require 'menu.php'; ?>

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

<script> CKEDITOR.replace( 'pinfo' );</script>

<?php  require '../includes/footer.php';?>

</html>