<?php
    session_start();
    require '../database/db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = dataFilter($_POST['name']);
        $mobile = dataFilter($_POST['mobile']);
        $user = dataFilter($_POST['uname']);
        $email = dataFilter($_POST['email']);
        $address = dataFilter($_POST['address']);

        $_SESSION['Email'] = $email;
        $_SESSION['Name'] = $name;
        $_SESSION['Username'] = $user;
        $_SESSION['MobileNo'] = $mobile;
        $_SESSION['Address'] = $address;

    }
    $id = $_SESSION['fid'];

    $sql = "UPDATE farmer SET fname='$name',fusername='$user',fmobile='$mobile',femail='$email' WHERE fid='$id';";

    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $_SESSION['message'] = "Profile Updated successfully !!!";
        header("Location: ../profileView.php");
    }
    else
    {
        $_SESSION['message'] = "There was an error in updating your profile! Please Try again!";
        header("Location: ../authenticate/error.php");
    }

function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
