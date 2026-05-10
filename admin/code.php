<?php
session_start();
include('database/db.php');

if (!$conn) {
    die("Database connection failed.");
}

if (isset($_POST['login_btn'])) {
    $email_login    = $_POST['emaill'];
    $password_login = $_POST['passwordd'];

    $query     = "SELECT * FROM adminuser WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($conn, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if ($usertypes && $usertypes['usertype'] == "admin") {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
        exit;
    }
}

if (isset($_POST['delete_btn'])) {
    if (!isset($_SESSION['username']) || !$_SESSION['username']) {
        header('Location: login.php');
        exit;
    }
    $id        = $_POST['delete_id'];
    $query     = "DELETE FROM fproduct WHERE pid='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['status']      = "Product deleted successfully";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status']      = "Failed to delete product";
        $_SESSION['status_code'] = "error";
    }
    header('Location: products.php');
    exit;
}
?>
