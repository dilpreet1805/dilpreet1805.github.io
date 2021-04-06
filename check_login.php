<?php 
    if($_SESSION['user']!=true)
    {
        header('location:login.php');
    }
?>