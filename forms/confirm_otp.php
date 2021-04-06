<?php 
    include_once('../config.php');
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username = $_POST['username'];
        $otp = $_POST['otp'];

        $check_otp = mysqli_query($con,"SELECT * FROM `account-activate-otp` WHERE `username`='$username' AND `otp`='$otp'");

        if(mysqli_num_rows($check_otp) > 0)
        {
            $_SESSION['user'] = true;
            $_SESSION['user_name'] = $username;

            $update = mysqli_query($con,"UPDATE `login` SET `status`='active' WHERE `username`='$username'");

            $delete = mysqli_query($con,"DELETE FROM `account-activate-otp` WHERE `username`='$username'");

            echo 'Success';

        }else
        {
            echo 'Security code is incorrect';
        }
    }
?>