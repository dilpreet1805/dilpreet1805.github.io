<?php 
    include_once('../config.php');
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $find_user = mysqli_query($con,"SELECT * FROM `login` WHERE `username`='$username'");

        if(mysqli_num_rows($find_user) > 0)
        {
            $fetch_user = mysqli_fetch_assoc($find_user);
            $hashed_password = $fetch_user['password'];
            $status = $fetch_user['status'];

            if($status ==='inactive')
            {
                if(password_verify($password,$hashed_password))
                {
                    echo 'Show OTP';

                }else
                {
                    echo 'Credentials entered does not match';
                }
            }else
            {
                if(password_verify($password,$hashed_password))
                {
                    $_SESSION['user'] = true;
                    $_SESSION['user_name'] = $username;
                    
                    echo "REDIRECT";

                }else
                {
                    echo 'Credentials entered does not match';
                }
            }
        }else
        {
            echo 'User does not exists';
        }
    }
?>