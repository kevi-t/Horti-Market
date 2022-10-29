<?php
include('security.php');

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM adminUser WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($conn, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if($usertypes['usertype'] == "admin")
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else if($usertypes['usertype'] == "user")
    {
        $_SESSION['cusername'] = $email_login;
        header('Location: ../index.php');
    }
    else
    {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM fproduct WHERE pid='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: products.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: products.php'); 
    }    
}
?>