<?php session_start();?>
<!DOCTYPE html>
<html >
  <head>
  <title>Horticulture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
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
  
   <h3>ERROR</h3>
       <p>
            <?php
                $page = $_SERVER['HTTP_REFERER'];
                if(isset($_SESSION['message']) AND !empty($_SESSION['message']))
                {
                  echo $_SESSION['message'];
                }
                else
                {
                   header("Location: ../index.php");
                }
            ?>
        </p><br />
        <a href ="<?= $page ?>" class="btn">Retry</a>
        <?php $_SESSION['message'] = ""; ?>
     
 </div>     
 </center> 
</div>

</body>

<?php  require '../includes/footer.php'; ?>

</html>