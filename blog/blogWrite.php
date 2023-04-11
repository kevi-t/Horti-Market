<?php
	session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Horticulture : Write a Blog</title>
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

	<form method="post" action="Blog/blogSubmit.php">
        <section id="main" class="wrapper">
            <div class="inner">
				<div class="container" style="width: 70%">
				<div class="row uniform">
					<div class="9u 12u$(small)">

					</div>
					
				</div>
				<br />
                <div class="box">
                    <div class="row uniform">
                        <div class="12u$">
                            <input type="text" name="blogTitle" id="blogTitle" value="" placeholder="Blog Title" required/>
                        </div>
                       	<div class="12u$">
							<textarea name="blogContent" id="blogContent" rows="12" placeholder="Blog Content"></textarea>
						</div>
						<br>
					
						<center>
						<input type="submit" name="submit" class="btn" value="SUBMIT"/>
						<a href="../blogView.php" class="btn">View Blogs</a>
					
						</center>
						</div>
                    </div>
                </div>
            </div>
        </section>
    </form>


</body>

<?php  require '../includes/footer.php';?>

</html>