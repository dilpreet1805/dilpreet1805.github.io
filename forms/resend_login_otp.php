<?php 
    include_once('../config.php');

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username = $_POST['username'];

        $otp = rand(1000,9999);

        $update = mysqli_query($con,"UPDATE `account-activate-otp` SET `otp`='$otp' WHERE `username`='$username'");

        $pick_email = mysqli_query($con,"SELECT `email` FROM `login` ORDER BY `id` ASC LIMIT 1");
        $fetch_email = mysqli_fetch_assoc($pick_email);
        $admin_email = $fetch_email['email'];

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
?>