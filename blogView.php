<?php
	session_start();

	require 'database/db.php';

	if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == 0)
	{
		$_SESSION['message'] = "You need to first login to access this page !!!";
		header("Location: authenticate/error.php");
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
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/footer.css" />
        <link rel="stylesheet" href="assets/css/menu.css" />
		<link rel="stylesheet" href="assets/css/blog.css" />
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>	
	</head>

<?php require 'includes/menu2.php';	?>

<body>
<div class="product-grid">

	<?php
		while($row = $result->fetch_array()) :
		$id = $row['blogId'];
		$sql = "SELECT * FROM blogfeedback WHERE blogId = '$id'";
		$result1 = mysqli_query($conn, $sql);
		$numComment = mysqli_num_rows($result1);
	?>

<form method="post" action="blogView.php" class="product-card">				
	<h2><?= $row['blogTitle']; ?></h2>
	<p><?= $row['blogContent']; ?><br>--- <?= $row['blogUser']; ?><?= $row['blogTime']; ?></p>
	<button class="btn3" name="<?php echo 'like'.$id; ?>">Like</button><?= $row['likes']?>Comments : <?= $numComment ?></button>
	<textarea name="comment" id="comment" rows="1" placeholder="Write a Comment!"></textarea>
	<button class="btn3"><?php echo 'submit'.$id; ?></button>
	<a href="blog/blogWrite.php"> <button class="btn3"> write</button></a>

<?php
	if($result1) :
		while($row1 = $result1->fetch_array()) :
?>

<img src="<?php echo 'assets/images/profileImages/'.$row1['commentPic']?>" alt="Avatar" height="10px" width="10px"><br><span><em><?= $row1['commentUser']; ?></em></span>
<br><?= $row1['comment']; ?><span class="time-right"><?= formatDate($row1['commentTime']); ?></span>
<?php endwhile; ?>
<?php endif; ?>

</form>
<?php endwhile; ?>

</div>	
</body>

<?php require 'includes/footer.php'; ?>

</html>