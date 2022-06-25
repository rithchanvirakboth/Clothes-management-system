<?php 
include ('authentication.php');

//ADD INCOME 
if(isset($_POST['save']))
{   
    $staff_id = $_POST['staff_id'];
    $date = $_POST['date'];
    $totalbonus = $_POST['totalbonus'];

    foreach ($staff_id as $key => $value){
    $query = "INSERT INTO total_bonus(staff_id, date_payment, total_bonus) VALUES  ('".$value ."', '".$date[$key]."', '". $totalbonus[$key]."')";
            $query_run = mysqli_query($conn, $query);
    }
    if($query_run){
        $_SESSION['message'] = "save total bonus succesfully";
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