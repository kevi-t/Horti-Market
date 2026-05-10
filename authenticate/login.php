<?php
session_start();
require '../database/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function dataFilter($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = dataFilter($_POST['email']);
    $pass  = dataFilter($_POST['pass']);

    // Check admin first
    $sql = "SELECT * FROM adminuser WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] === $pass) {
            $_SESSION['username'] = $email;
            header("Location: ../admin/index.php");
            exit;
        } else {
            $_SESSION['message'] = "Wrong password!";
            header("Location: error.php");
            exit;
        }
    }

    // Check farmer table
    $sql = "SELECT * FROM farmer WHERE femail='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['fpassword'])) {
            $_SESSION['id']        = $row['fid'];
            $_SESSION['Password']  = $row['fpassword'];
            $_SESSION['Email']     = $row['femail'];
            $_SESSION['Name']      = $row['fname'];
            $_SESSION['Username']  = $row['fusername'];
            $_SESSION['Mobile']    = $row['fmobile'];
            $_SESSION['Addr']      = $row['faddress'];
            $_SESSION['Active']    = $row['factive'];
            $_SESSION['picStatus'] = $row['picStatus'];
            $_SESSION['picExt']    = $row['picExt'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category']  = 1;
            $_SESSION['Rating']    = 0;

            if ($_SESSION['picStatus'] == 0) {
                $_SESSION['picId']   = 0;
                $_SESSION['picName'] = "profile0.png";
            } else {
                $_SESSION['picId']   = $_SESSION['id'];
                $_SESSION['picName'] = "profile" . $_SESSION['picId'] . "." . $_SESSION['picExt'];
            }
            header("Location: ../home.php");
            exit;
        } else {
            $_SESSION['message'] = "Wrong password!";
            header("Location: error.php");
            exit;
        }
    }

    // Check buyer table
    $sql = "SELECT * FROM buyer WHERE bemail='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['bpassword'])) {
            $_SESSION['id']        = $row['bid'];
            $_SESSION['Password']  = $row['bpassword'];
            $_SESSION['Email']     = $row['bemail'];
            $_SESSION['Name']      = $row['bname'];
            $_SESSION['Username']  = $row['busername'];
            $_SESSION['Mobile']    = $row['bmobile'];
            $_SESSION['Addr']      = $row['baddress'];
            $_SESSION['Active']    = $row['bactive'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category']  = 0;
            header("Location: ../home.php");
            exit;
        } else {
            $_SESSION['message'] = "Wrong password!";
            header("Location: error.php");
            exit;
        }
    }

    // Email not found in any table
    $_SESSION['message'] = "No account found with this email!";
    header("Location: error.php");
    exit;
}
?>
