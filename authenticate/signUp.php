<?php
  session_start();
  require '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   function dataFilter($data)
   {
	  $data = trim($data);
 	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
  	  return $data;
   }

	$name = dataFilter($_POST['name']);
	$mobile = dataFilter($_POST['mobile']);
	$user = dataFilter($_POST['uname']);
	$email = dataFilter($_POST['email']);
  $pass = dataFilter($_POST["pass"]);  
  $pass = password_hash($pass, PASSWORD_DEFAULT); 
	$category = dataFilter($_POST['category']);
  $addr = dataFilter($_POST['addr']);

	$_SESSION['Email'] = $email;
  $_SESSION['Name'] = $name;
  $_SESSION['Password'] = $pass;
  $_SESSION['Username'] = $user;
  $_SESSION['Mobile'] = $mobile;
  $_SESSION['Category'] = $category;
  $_SESSION['Addr'] = $addr;
  $_SESSION['Rating'] = 0;

$length = strlen($mobile);
if($length != 10)
{
  $_SESSION['message'] = "Invalid Mobile Number !!!";
  header("location: error.php");
  die();
}

if($category == 1)
{
    $result = mysqli_query($conn, "SELECT * FROM farmer WHERE femail='$email'") or die($mysqli->error());
    $result2 = mysqli_query($conn, "SELECT * FROM buyer WHERE bemail='$email'") or die($mysqli->error());
    if ($result->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        header("location: error.php");
    }
    else if($result2->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        header("location: error.php");
    }
    else
    {
      $code = rand(999999, 111111);
      $status = "notverified";
    	$sql = "INSERT INTO farmer (fname, fusername, fpassword, fmobile, femail, faddress, code, status)
    			VALUES ('$name','$user','$pass','$mobile','$email','$addr','$code', '$status')";
    
          $data_check = mysqli_query($conn, $sql);
          if($data_check)
          {
            $subject = "Email Verification Code";
            $message = "Your verification code is $code Use it activate Your account";
            $sender = "From: kelvinwafula1999@gmail.com";
            if(mail($email, $subject, $message, $sender))
            {
               $info = "A Verification Code has been sent to your email - $email";
               $_SESSION['info'] = $info;
               $_SESSION['email'] = $email;
               $_SESSION['password'] = $password;
               header("location: verificationpage.php");
               
            }
            else
            {
              $_SESSION['message'] = "Failed while sending code!";
              header("location: error.php");
            }
          }
          else
          {
            $_SESSION['message'] = "Registration failed!";
              header("location: error.php");
          }
         
    }
    
    
}

else
{
    $result = mysqli_query($conn, "SELECT * FROM buyer WHERE bemail='$email'") or die($mysqli->error());
    $result2 = mysqli_query($conn, "SELECT * FROM farmer WHERE femail='$email'") or die($mysqli->error());
    if ($result->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        header("location: error.php");
    }
    else if($result2->num_rows > 0 )
    {
        $_SESSION['message'] = "User with this email already exists!";
        header("location: error.php");
    }
    else
    {
      $code = rand(999999, 111111);
      $status = "notverified";
    	$sql = "INSERT INTO buyer (bname, busername, bmobile, bemail, bpassword, baddress, code, status)
    			VALUES ('$name','$user','$mobile','$email','$pass','$addr','$code', '$status')";
    
          $data_check = mysqli_query($conn, $sql);
          if($data_check)
          {
            $subject = "Email Verification Code";
            $message = "Your verification code is $code Use it activate Your account";
            $sender = "From: kelvinwafula1999@gmail.com";
            if(mail($email, $subject, $message, $sender))
            {
               $info = "A Verification Code has been sent to your email - $email";
               $_SESSION['info'] = $info;
               $_SESSION['email'] = $email;
               $_SESSION['password'] = $password;
               header("location: verificationpage.php");
               
            }
            else
            {
              $_SESSION['message'] = "Failed while sending code!";
              header("location: error.php");
            }
          }
          else
          {
            $_SESSION['message'] = "Registration failed!";
              header("location: error.php");
          }
         
    }
  
}

}


?>