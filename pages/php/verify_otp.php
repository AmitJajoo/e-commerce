<?php
require_once("../../common_files/database/database.php");
session_start();
$otp = $_SESSION['otp'];
$user_otp = $_POST['otp'];
$email = $_POST['email'];
if($otp==$user_otp){
    $update_status = "UPDATE users SET status='active' WHERE email='$email'";
    $response = $db->query($update_status);
    if($response){
        echo "success";
    }
    else{
        echo "Can't able to update status";
    }
}else{
    echo "Wrong OTP";
}

?>