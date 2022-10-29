<?php
session_start();
include('database/db.php');

if($conn)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/db.php");
}
if(!$_SESSION['username'])
{
    header('Location: login.php');
}
?>