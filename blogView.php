<?php
	session_start();

	require 'db.php';

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0)
	{
		$_SESSION['message'] = "You need to first login to access this page !!!";
		header("Location: Login/error.php");
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
	{
		if(isset($_POST['comment']) AND $_POST['comment'] != "")
		{
			$sql = "SELECT * FROM blogdata ORDER BY blogId DESC";
			$result = mysqli_query($conn, $sql);

			while($row = $result->fetch_array())
			{
				$check = "submit".$row['blogId'];
				if(isset($_POST[$check]))
				{
					$blogId = $row['blogId'];
					break;
	 			}
			}

			$comment = dataFilter($_POST['comment']);
			if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1)
			{
				$commentUser = $_SESSION['Username'];
				$pic = $_SESSION['picName'];
			}
			else {
				$commentUser = "Anonymous";
				$pic = "profile0.png";
			}
			if(isset($blogId))
			{
				$sql = "INSERT INTO blogfeedback (blogId, comment, commentUser, commentPic)
						VALUES ('$blogId' ,'$comment', '$commentUser', '$pic');";
				$result = mysqli_query($conn, $sql);
			}
		}

		else
		{
			$sql = "SELECT * FROM blogdata ORDER BY blogId DESC";
			$result = mysqli_query($conn, $sql);

			while($row = $result->fetch_array())
			{
				$check = "like".$row['blogId'];
				if(isset($_POST[$check]))
				{
					$blogId = $row['blogId'];
					break;
				}
			}
			$likeCheck = "isLiked".$blogId;
			if(!isset($_SESSION[$likeCheck]) OR $_SESSION[$likeCheck] == 0)
			{
				$id = $_SESSION['id'];
				$sql = "SELECT * FROM likedata WHERE blogId = '$blogId' AND blogUserId = '$id'";
				$result = mysqli_query($conn, $sql);
				$num_rows = mysqli_num_rows($result);
				if($num_rows == 0)
				{
					$sql = "INSERT INTO likedata (blogId, blogUserId)
							VALUES('$blogId', '$id')";
					$result = mysqli_query($conn, $sql);
					$sql = "UPDATE blogdata SET likes = likes + 1 WHERE blogId = '$blogId'";
					$result = mysqli_query($conn, $sql);
					$_SESSION[$likeCheck] = 1;
				}
			}
		}
	}

	function dataFilter($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$sql = "SELECT * FROM blogdata ORDER BY blogId DESC";
	$result = mysqli_query($conn, $sql);

	function formatDate($date)
	{
		return date('g:i a', strtotime($date));
	}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Horticulture : Blogs</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="indexfooter.css" />
        <link rel="stylesheet" href="menu.css" />
        <script src="js2/jquery.min.js"></script>
        <script src="js2/bootstrap.min.js"></script>
	</head>

<?php require 'menu2.php';	?>

<body>

<div class="cont">
	
						<form method="post" action="blogView.php" class="container">
								
					<?php
						while($row = $result->fetch_array()) :
							$id = $row['blogId'];
							$sql = "SELECT * FROM blogfeedback WHERE blogId = '$id'";
							$result1 = mysqli_query($conn, $sql);
							$numComment = mysqli_num_rows($result1);
					?>
					<div class="box">
						<h2><?= $row['blogTitle']; ?></h2>
						<blockquote>
							<?= $row['blogContent']; ?>
							<p>--- <?= $row['blogUser']; ?></p>
							<p><?= $row['blogTime']; ?></p>
						</blockquote>

							<div class="row">
								<div class="6u 12u$(xsmall)">
									<button class = "button special small" name="<?php echo 'like'.$id; ?>">
									<span class="glyphicon glyphicon-thumbs-up"></span> Like</button>
									<span><?= $row['likes']?></span>
								</div>
								<div class="6u 12u$(xsmall)">
									<span class="glyphicon glyphicon-pencil"></span> Comments : <?= $numComment ?></button>
								</div>
								<div class="12u$">
									<br>
									<textarea name="comment" id="comment" rows="1" placeholder="Write a Comment!"></textarea>
								</div>
								<div class="12u$">
									<center>
									<br>
									<input type="submit" name="<?php echo 'submit'.$id; ?>" class="button special small" value="Submit"/>
									</center>
								</div>
								<div class="3u 12u$(small)">
							<a href="blogWrite.php" class="button special fit"><span class="glyphicon glyphicon-pencil"></span> Write a Blog</a>
						</div>
							</div>
						</form>

						<?php
							if($result1) :
								while($row1 = $result1->fetch_array()) :
						?>
							<div class="con darker">
								<img src="<?php echo 'images/profileImages/'.$row1['commentPic']?>" alt="Avatar"><span><em><?= $row1['commentUser']; ?></em></span>
								<br>
								<?= $row1['comment']; ?>
								<span class="time-right"><?= formatDate($row1['commentTime']); ?></span>
							</div>

							<?php endwhile; ?>
						<?php endif; ?>
					</div>

					<?php endwhile; ?>

				</div>
			</section>

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

 <script>

		/*	function ajax()
			{
				var req = new XMLHttpRequest();
				req.onreadystatechange = function()
				{
					if(req.readyState == 4 && req.status == 200)
					{
						document.getElementById('liked').innerHTML = req.responseText;
					}
				}
				req.open('POST', 'Blog/blogViewProcess.php', 'true');
				req.send();
			}
			setInterval(function(){ajax()}, 1000);*/

		</script>


		<script src="jquery/jquery-3.2.1.min.js"></script>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script>
			 CKEDITOR.replace( 'blogContent' );
		</script>

		<!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

</html>