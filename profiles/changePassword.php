<?php
    session_start();

    require '../database/db.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user = dataFilter($_POST['femail']);
        $currPass = $_POST['fpassword'];
        $newPass = $_POST['newPass'];
        $conNewPass = $_POST['conNewPass'];
        $newHash = dataFilter( md5( rand(0,1000) ) );
    }

    $sql = "SELECT * FROM farmer WHERE fusername='$user'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);


    if($num_rows == 0)
    {
        $_SESSION['message'] = "Invalid User Credentials!";
        header("location: ../authenticate/error.php");
    }
    else
    {
        $User = $result->fetch_assoc();

        if(password_verify($_POST['currPass'], $User['Password']))
        {
            if($newPass == $conNewPass)
            {
                $conNewPass = dataFilter(password_hash($_POST['conNewPass'], PASSWORD_BCRYPT));
                $currHash = $_SESSION['Hash'];
                $sql = "UPDATE members SET Password='$conNewPass', Hash='$newHash' WHERE Hash='$currHash';";

                $result = mysqli_query($conn, $sql);

                if($result)
                {
                    $_SESSION['message'] = "Password changed Successfully!";
                    header("location: ../authenticate/success.php");
                }
                else
                {
                    $_SESSION['message'] = "Error occurred while changing password<br>Please try again!";
                    header("location: ../authenticate/error.php");
                }
            }
        }
        else
        {
            $_SESSION['message'] = "Invalid current User Credentials!";
            header("location: ../authenticate/error.php");
        }
    }

    function dataFilter($data)
    {
    	$data = trim($data);
     	$data = stripslashes($data);
    	$data = htmlspecialchars($data);
      	return $data;
    }

?>
