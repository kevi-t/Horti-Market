<?php  session_start(); ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horticulture Web-App:Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

<div class="container">
   <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form action="verify.php" method="POST">
            <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group"><input class="form-control" type="number" name="otp" placeholder="Enter verification code" required></div>
                    <b>Category :</b>  
                    <input type="radio" id="farmer" name="category" value="1" class="radio" checked><label for="farmer">Farmer</label>
                    <input type="radio" id="buyer" name="category" value="0" class="radio"><label for="buyer">Buyer</label></br>
	                <div class="form-group"><input class="form-control button" type="submit" name="check" value="Submit"></div>
            </form>
            </div>
    </div>
</div>

</body>

</html>