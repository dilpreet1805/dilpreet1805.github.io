<?php 
    session_start();
    $con = mysqli_connect("localhost","root","","sreemari_hospital");

    if(!$con)
    {
        echo "Database connection failed";
    }
?>