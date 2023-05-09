<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horticulture Web-App:Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/footer.css" />
    <link rel="stylesheet" href="../assets/css/menu.css" />
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</head>

<?php  require 'menu.php'; ?>

<body>

<div class="bg-img">
 <center>   
 <div class="container">
            <form action="verify.php" method="POST">
            <h2 class="text-center">Code Verification</h2>
                    
                    <div class="form-group"><input class="form-control" type="number" name="otp" placeholder="Enter verification code" required></div>
                    <b>Category :</b>  
                    <input type="radio" id="farmer" name="category" value="1" class="radio" checked><label for="farmer">Farmer</label>
                    <input type="radio" id="buyer" name="category" value="0" class="radio"><label for="buyer">Buyer</label></br>
	                <div class="form-group"><input class="form-control button" type="submit" name="check" value="Submit"></div>
            </form>
            </div>
    </div>
</center>    
</div>

</body>

<?php  require '../includes/footer.php'; ?>

</html>