<?php
    session_start();
?>

<!DOCTYPE HTML>

<html lang="en">
    <head>
        <title>Profile: <?php echo $_SESSION['Username']; ?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/footer.css"/>
        <link rel="stylesheet" href="../assets/css/menu.css" />
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script> 
    </head>

    <body>

    <?php require 'menu.php';?>
    <div class="bg-img">
    <center>
    <form method="post" action="updatePic.php" class="container">
    <h2>Update Profile Picture Here..!!</h2>
       <header>
        
          <span class="image left"><img src="<?php echo '../assets/images/profileImages/'.$_SESSION['picName'].'?'.mt_rand(); ?>" class="img-circle" class="img-responsive" height="150px"></span>
          <h2><?php echo $_SESSION['Name'];?> <?php echo $_SESSION['Username'];?></h2>
          
          <!-- <form method="post" action="updatePic.php" enctype="multipart/form-data"> -->
          <input type="file" name="profilePic" id="profilePic"><br>
          <button class="btn">Upload Pic</button>
          <button class="btn">Remove Pic</button>
         <!-- </form> -->
           
      </header> 
                       
    </form>
    </center>
    </div>

</body>

<?php  require '../includes/footer.php';?>

</html>