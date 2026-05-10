<?php
    session_start();
    require '../database/db.php';

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header("Location: ../loginpage.php");
        exit;
    }

    $otp      = (int)$_POST['otp'];
    $category = (int)$_POST['category'];
    $email    = $_SESSION['email'] ?? '';

    if (empty($email)) {
        $_SESSION['message'] = "Session expired. Please register again.";
        header("Location: error.php");
        exit;
    }

    if ($category == 1) {
        $sql = "SELECT * FROM farmer WHERE femail='$email' AND code='$otp'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            mysqli_query($conn, "UPDATE farmer SET status='verified' WHERE femail='$email'");
            unset($_SESSION['email']);
            $_SESSION['message'] = "Account verified successfully! You can now log in.";
            header("Location: ../loginpage.php");
        } else {
            $_SESSION['message'] = "Invalid verification code. Please try again.";
            header("Location: verificationpage.php");
        }
    } else {
        $sql = "SELECT * FROM buyer WHERE bemail='$email' AND code='$otp'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            mysqli_query($conn, "UPDATE buyer SET status='verified' WHERE bemail='$email'");
            unset($_SESSION['email']);
            $_SESSION['message'] = "Account verified successfully! You can now log in.";
            header("Location: ../loginpage.php");
        } else {
            $_SESSION['message'] = "Invalid verification code. Please try again.";
            header("Location: verificationpage.php");
        }
    }
    exit;
?>
