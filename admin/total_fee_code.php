<?php 
include ('authentication.php');

//ADD INCOME 
if(isset($_POST['save']))
{   
    $staff_id = $_POST['staff_id'];
    $date = $_POST['date'];
    $totalfee = $_POST['totalfee'];

    foreach ($staff_id as $key => $value){
    $query = "INSERT INTO total_fee(staff_id, date_payment, total_fee) VALUES  ('".$value ."', '".$date[$key]."', '". $totalfee[$key]."')";
            $query_run = mysqli_query($conn, $query);
    }
    if($query_run){
        $_SESSION['message'] = "save total fee succesfully";
        header('Location: total-bonus.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "something went wrong!!";
        header('Location: add-total-bonus.php');
        exit(0);
    }
        
}

?>