<?php 
include ('authentication.php');

//ADD payment 
if(isset($_POST['save']))
{   
    $staff_id = $_POST['staff_id'];
    $salary = $_POST['salary'];
    $totalbonus = $_POST['totalbonus'];
    $totalfee = $_POST['totalfee'];
    $date = $_POST['date'];
    $totalpayment = $salary + $totalbonus + $totalfee;

    $query = "INSERT INTO payments(staff_id, date_payment, payment_amount) VALUES  ('$staff_id', '$date', '$totalpayment')";
            $query_run = mysqli_query($conn, $query);
    }
    if($query_run){
        $_SESSION['message'] = "save payment succesfully";
        header('Location: payment.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "something went wrong!!";
        header('Location: add-payment.php');
        exit(0);
    }

?>