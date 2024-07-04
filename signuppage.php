<!DOCTYPE html>
<html>
<head>
<title>Horticulture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/footer.css" />
  <link rel="stylesheet" href="assets/css/menu.css" />
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>

<?php	require 'includes/menu.php';?>

<body>
<div class="bg-img">
 <center>
<form action="authenticate/signUp.php" method='POST' class="container">
    <h2>SIGNUP</h2>
	<div class="form-group">
        <input class="form-control" type="text" name="name" id="name" value="" placeholder="Name" required/>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="uname" id="uname" value="" placeholder="Surname" required/>
    </div>
	<div class="form-group">
        <input class="form-control" type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required/>
    </div>
	<div class="form-group">
        <input class="form-control" type="email" name="email" id="email" value="" placeholder="Email" required style="width:80% ">
    </div>
    <div class="form-group">
        <input class="form-control"  type="password" name="pass" id="pass" value="" placeholder="Password" required>
    </div>
   	<input type="checkbox"onclick="myFunction()" >Show Password</br>
	<div class="form-group">
        <input class="form-control" type="text" name="addr" id="addr" value="" placeholder="Address" required/>
    </div>
	<b>Category :</b>  <input type="radio" id="farmer" name="category" value="1" class="radio" checked><label for="farmer">Farmer</label>&nbsp &nbsp
    <input type="radio" id="buyer" name="category" value="0" class="radio"><label for="buyer">Buyer</label></br>
	<button type="submit" class="btn" value="submit" name="submit" class="special" >Register</button>
  </form>
</center>
</div>


</body>
<?php	require 'includes/footer.php';?>

<script type="text/javascript">
	function myFunction() {
    var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
        } 
		 else {
         x.type = "password";
        }
    }
</script>

</html>