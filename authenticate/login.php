<?php
  session_start();
  require '../database/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
     
function dataFilter($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$email = dataFilter($_POST['email']);
$pass = dataFilter($_POST["pass"]);  
$category = dataFilter($_POST['category']);

if($category == 1)
{
    $sql = "SELECT * FROM farmer WHERE femail='$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0)
    {
     $_SESSION['message'] = "User with this Email does not exist!";
    // echo "User with this Email does not exist ";
     header("location: error.php");
    }
    else
    {
      if(mysqli_num_rows($result) > 0)  
      {  
        while($row = mysqli_fetch_array($result))  
        {  
          if(password_verify($pass, $row["fpassword"]))  
          { 
            $_SESSION['id'] = $row['fid'];
            $_SESSION['Password'] = $row['fpassword'];
            $_SESSION['Email'] = $row['femail'];
            $_SESSION['Name'] = $row['fname'];
            $_SESSION['Username'] = $row['fusername'];
            $_SESSION['Mobile'] = $row['fmobile'];
            $_SESSION['Addr'] = $row['faddress'];
            $_SESSION['Active'] = $row['factive'];
            $_SESSION['picStatus'] = $row['picStatus'];
            $_SESSION['picExt'] = $row['picExt'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category'] = 1;
            $_SESSION['Rating'] = 0;

            if($_SESSION['picStatus'] == 0)
            {
              $_SESSION['picId'] = 0;
              $_SESSION['picName'] = "profile0.png";
            }
            else
            {
              $_SESSION['picId'] = $_SESSION['id'];
              $_SESSION['picName'] = "profile".$_SESSION['picId'].".".$_SESSION['picExt'];
            } 
            //echo "Login Successfully";
            header("location: ../home.php");
          }  
          else  
          {  
            $_SESSION['message'] = "Wrong password!";
            header("location: error.php");
            //echo "Wrong password";  
          }  
        }  
      }  
    }
}
else
{
    $sql = "SELECT * FROM buyer WHERE bemail='$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0)
    {
      $_SESSION['message'] = "User with this Email does not exist!";
      header("location: error.php");
      // echo "User with this Email does not exist ";
    }
    else
    {
      if(mysqli_num_rows($result) > 0)  
      {  
        while($row = mysqli_fetch_array($result))  
        {  
          if(password_verify($pass, $row["bpassword"]))  
          {  
            $_SESSION['id'] = $row['bid'];
            $_SESSION['Password'] = $row['bpassword'];
            $_SESSION['Email'] = $row['bemail'];
            $_SESSION['Name'] = $row['bname'];
            $_SESSION['Username'] = $row['busername'];
            $_SESSION['Mobile'] = $row['bmobile'];
            $_SESSION['Addr'] = $row['baddress'];
            $_SESSION['Active'] = $row['bactive'];
            $_SESSION['logged_in'] = true;
            $_SESSION['Category'] = 0;
            header("location: ../home.php");
            //echo "Login Successfully";
          }  
          else  
          {  
            $_SESSION['message'] = "Wrong password!";
            header("location: error.php");
            //echo "Wrong password";  
          }  
        }  
      }  
    }
}
}
   

?>