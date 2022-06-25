<?php 
    error_reporting(0);
    session_start();
    include('config/dbconfig.php');


    if(!isset($_SESSION['auth'])){

        $_SESSION['message'] = "Login to access the dashboard";
        header("Location: ../login.php");
        exit(0);
    }
    // else {
    //     if($_SESSION['auth_role'] != "1" ){
    //         $_SESSION['message'] = "You are not authorized as ADMIN";
    //         header("Location: ../login.php");
    //         exit(0);
    //     }
    // }


?>