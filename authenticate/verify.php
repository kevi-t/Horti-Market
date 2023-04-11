<?php  session_start();

require "../db.php";
require "signUp.php";
$email = "";
$name = "";
$errors = array();


//if user click verification code submit button
if(isset($_POST['check']))
{
    function dataFilter($data)
   {
	  $data = trim($data);
 	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
  	  return $data;
   }
    $category= dataFilter($_POST['category']);
    if($category == 1)
    {
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM farmer WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0)
        {
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE farmer SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            if($update_res)
            {
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: profile.php');
                exit();
            }
            else
            {
                $errors['otp-error'] = "Failed while updating code!";
            }
        }
        else
        {
            $errors['otp-error'] = "You've entered incorrect code!";
        }
  
    }
    else
    {
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM buyer WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0)
        {
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE buyer SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            if($update_res)
            {
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: profile.php');
                exit();
            }
            else
            {
                $errors['otp-error'] = "Failed while updating code!";
            }
        }
        else
        {
            $errors['otp-error'] = "You've entered incorrect code!";
        }      
    }
}
?>