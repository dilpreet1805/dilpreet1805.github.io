<?php 
    include_once('../config.php');
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username = $_POST['username'];

        $check_username = mysqli_query($con,"SELECT * FROM `login` WHERE `username` = '$username'");

        if(mysqli_num_rows($check_username) > 0)
        {
            $pick_email = mysqli_query($con,"SELECT `email` FROM `login` ORDER BY `id` ASC LIMIT 1");
            $fetch_email = mysqli_fetch_assoc($pick_email);
            $admin_email = $fetch_email['email'];

            $otp = rand(1000,9999);

            $check_otp = mysqli_query($con,"SELECT * FROM `forgot-password-otp` WHERE `username` = '$username'");
            if(mysqli_num_rows($check_otp) > 0)
            {
                $update = mysqli_query($con,"UPDATE `forgot-password-otp` SET `otp`='$otp' WHERE `username`='$username'");

                $to = $admin_email;
                $subject = 'Password change request';
                $headers = "From: noreply@sreemari.in \r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $message = "<html><body>";
                $message .= "<p>Password change request for master section by username - ".$username.". One time passwrod is <strong>".$otp."</strong> \r\n It's confidential, not to be shared</p>";
                $message .= "</body></html>";
                
                echo 'Success';
            }else
            {
                $insert = mysqli_query($con,"INSERT INTO `forgot-password-otp`(`id`,`username`,`otp`)VALUES('','$username','$otp')");

                $to = $admin_email;
                $subject = 'Password change request';
                $headers = "From: noreply@sreemari.in \r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $message = "<html><body>";
                $message .= "<p>Password chenge request for master section by username - ".$username.". One time passwrod is <strong>".$otp."</strong> \r\n It's confidential, not to be shared</p>";
                $message .= "</body></html>";
                
                echo 'Success';
            }
        }else
        {
            echo 'Username does not exists';
        }
    }
?>