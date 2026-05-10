<?php
    session_start();
    require '../database/db.php';

    function dataFilter($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1) {
        $_SESSION['message'] = "You must be logged in to change your password!";
        header("Location: ../authenticate/error.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $currPass  = $_POST['currPass'];
        $newPass   = $_POST['newPass'];
        $conNewPass = $_POST['conNewPass'];
        $id        = $_SESSION['id'];
        $category  = $_SESSION['Category'];

        if ($newPass !== $conNewPass) {
            $_SESSION['message'] = "New passwords do not match!";
            header("Location: ../authenticate/error.php");
            exit;
        }

        if ($category == 1) {
            $sql    = "SELECT * FROM farmer WHERE fid='$id'";
            $table  = 'farmer';
            $passCol = 'fpassword';
            $idCol  = 'fid';
        } else {
            $sql    = "SELECT * FROM buyer WHERE bid='$id'";
            $table  = 'buyer';
            $passCol = 'bpassword';
            $idCol  = 'bid';
        }

        $result = mysqli_query($conn, $sql);
        $User   = mysqli_fetch_assoc($result);

        if ($User && password_verify($currPass, $User[$passCol])) {
            $hashedNew = password_hash($conNewPass, PASSWORD_BCRYPT);
            $sql = "UPDATE $table SET $passCol='$hashedNew' WHERE $idCol='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['message'] = "Password changed successfully!";
                header("Location: ../authenticate/success.php");
            } else {
                $_SESSION['message'] = "Error occurred while changing password. Please try again!";
                header("Location: ../authenticate/error.php");
            }
        } else {
            $_SESSION['message'] = "Current password is incorrect!";
            header("Location: ../authenticate/error.php");
        }
        exit;
    }
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Change Password</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/footer.css"/>
    <link rel="stylesheet" href="../assets/css/menu.css"/>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>

<?php require 'menu.php'; ?>

<div class="bg-img">
<center>
<form method="post" action="changePassword.php" class="container">
    <h2>Change Password</h2>
    <div class="form-group">
        <input class="form-control" type="password" name="currPass" placeholder="Current Password" required/>
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="newPass" placeholder="New Password" required/>
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="conNewPass" placeholder="Confirm New Password" required/>
    </div>
    <button class="btn btn-danger">Change Password</button>
</form>
</center>
</div>

</body>
<?php require '../includes/footer.php'; ?>
</html>
