<?php
	session_start();
	require 'db.php';
    $pid = $_GET['pid'];
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['name'];
        $city = $_POST['city'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $pincode = $_POST['pincode'];
        $addr = $_POST['addr'];
        $bid = $_SESSION['id'];

        $sql = "INSERT INTO transaction (bid, pid, name, city, mobile, email, pincode, addr)
                VALUES ('$bid', '$pid', '$name', '$city', '$mobile', '$email', '$pincode', '$addr')";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $_SESSION['message'] = "Order Succesfully placed! <br /> Thanks for shopping with us!!!";
            header('Location: Login/success.php');
        }
        else {
           // echo $result->mysqli_error();
            $_SESSION['message'] = "Sorry!<br />Order was not placed";
            header('Location: Login/error.php');
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Horticulture: Transaction</title>
	<meta lang="eng">
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="indexfooter.css" />
    <link rel="stylesheet" href="menu.css" />
    <script src="js2/jquery.min.js"></script>
    <script src="js2/bootstrap.min.js"></script> 
</head>
<body>

    <?php
        require 'menu2.php';
    ?>

<body>
<div class="bg-img">
 <center>
 <form action="buyNow.php" method='POST' class="container">
        <h2>Transaction Details</h2>
        <div class="form-group">
            <input class="form-control" type="text" name="name" id="name" value="" placeholder="Name" required/>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="city" id="city" value="" placeholder="City" required/>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required/>
        </div>           
        <div class="form-group">
            <input class="form-control" type="email" name="email" id="email" value="" placeholder="Email" required style="width:80% "/>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="pincode" id="pincode" value="" placeholder="Pincode" required/>
        </div>   
        <div class="form-group">
            <input class="form-control" type="text" name="addr" id="addr" value="" placeholder="Address" required/>
        </div>
        <p>
          <input type="submit" value="Confirm Order" />
          <a href="Mpesa-Transaction">Mpesa Payment</a>
        </p>                
        
</form>
</center>
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