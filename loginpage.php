<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
    header("Location: home.php");
    exit;
}
?>
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

<?php require 'includes/menu.php';?>

<body>
<div class="bg-img">
 <center>
<form action="authenticate/login.php" method='POST' class="container">
    <h2>LOGIN</h2>
    <div class="form-group">
        <input class="form-control" type="email" name="email" id="email" value="" placeholder="Email" required style="width:80%">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="pass" id="pass" value="" placeholder="Password" required>
    </div>
    <button type="submit" class="btn" name="submit">Login</button>
    <p style="color:#fff;margin-top:14px;">Don't have an account? <a href="signuppage.php" style="color:#04AA6D;">Register</a></p>
</form>
</center>
</div>

</body>

<?php require 'includes/footer.php';?>

</html>
