<?php 
    include_once('../config.php');
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['email']))
        {
            $email = $_POST['email'];
        }else
        {
            $email = '';
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash = password_hash($password,PASSWORD_DEFAULT);

        $check_email = mysqli_query($con,"SELECT * FROM `login`");

        if(mysqli_num_rows($check_email) > 0)
        {
            $pick_email = mysqli_query($con,"SELECT `email` FROM `login` ORDER BY `id` ASC LIMIT 1");
            $fetch_email = mysqli_fetch_assoc($pick_email);
            $admin_email = $fetch_email['email'];

            $find_user = mysqli_query($con,"SELECT * FROM `login` WHERE `username`='$username'");

            if(mysqli_num_rows($find_user) > 0)
            {
                echo 'Username already exists';
            }else
            {
                $insert = mysqli_query($con,"INSERT INTO `login`(`id`,`username`,`password`,`email`,`status`)VALUES('','$username','$hash','$email','inactive')");

                $otp = rand(1000,9999);

                $insert_otp = mysqli_query($con,"INSERT INTO `account-activate-otp`(`id`,`username`,`otp`)VALUES('','$username','$otp')");

                $to = $admin_email;
                $subject = 'Account activation request';
                $headers = "From: noreply@sreemari.in \r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $message = "<html><body>";
                $message .= "<p>New account created for master section by username - ".$username.". One time passwrod is <strong>".$otp."</strong> \r\n It's confidential, not to be shared</p>";
                $message .= "</body></html>";
                
                echo 'Success';
            }
        }else
        {
            $insert = mysqli_query($con,"INSERT INTO `login`(`id`,`username`,`password`,`email`,`status`)VALUES('','$username','$hash','$email','active')");

            echo 'Success';
        }
    }
?>