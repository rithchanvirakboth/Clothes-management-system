<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "admin-panel-project";
    
$conn = mysqli_connect("$host", "$username", "$password", "$database");
    if (!$conn) {
    header('Location: ../error/dberror.php');
    die();
    } 
?>