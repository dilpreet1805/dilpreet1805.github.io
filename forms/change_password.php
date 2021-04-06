<?php 
    include_once('../config.php');
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username = $_POST['username'];
        $otp = $_POST['otp'];
        $new_password = $_POST['new_password'];
        $hash = password_hash($new_password,PASSWORD_DEFAULT);

        $check_otp = mysqli_query($con,"SELECT * FROM `forgot-password-otp` WHERE `username`='$username' AND `otp`='$otp'");
        if(mysqli_num_rows($check_otp) > 0)
        {
            $update = mysqli_query($con,"UPDATE `login` SET `password`='$hash' WHERE `username`='$username'");

            $delete = mysqli_query($con,"DELETE FROM `forgot-password-otp` WHERE `username`='$username'");
            
            echo 'Success';
        }else
        {
            echo 'Code entered is not correct';
        }
    }
?>