<?php
    session_start();

    if ( $_SESSION['logged_in'] != 1 )
    {
      $_SESSION['message'] = "You must log in before viewing your profile page!";
      header("location: error.php");
    }
    else
    {

       $email =  $_SESSION['Email'];
       $name =  $_SESSION['Name'];
       $user =  $_SESSION['Username'];
       $mobile = $_SESSION['Mobile'];
       $active = $_SESSION['Active'];
    }
?>

<!DOCTYPE html>
<html >
  <head>
  <title>Horticulture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/footer.css"/>
  <link rel="stylesheet" href="../assets/css/menu.css" />
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script> 
  </head>

<?php  require '../includes/menu2.php'; ?>

<body>

<div class="bg-img">
<center> 
<div class="container">
    <header class="major"><h2>Welcome</h2></header>
    <p>
      <?php
        if ( isset($_SESSION['message']) )
        {
           echo $_SESSION['message'];
           unset( $_SESSION['message'] );
        }
      ?>
    </p>
    <?php
     if ( !$active )
     {
       echo"<div>Your Registration was Successfull You can now view your Profile</div>";
     }
    ?>
    <h2><?php echo $name; ?></h2>
    <p><?= $email ?></p>
    <?php if($_SESSION['Category'] == 1): ?>
    <?php else: ?>
    <?php endif; ?>                           
</div>
</center>
</div>

</body>

<?php  require '../includes/footer.php';?>

</html>