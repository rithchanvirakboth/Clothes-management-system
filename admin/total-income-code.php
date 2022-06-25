<?php 
include ('authentication.php');

//ADD INCOME 
if(isset($_POST['save']))
{
    $date = $_POST['date'];
    $total_daily_income = $_POST['total_daily_income'];
    $total_invoice = $_POST['total_invoice'];

    $query = "INSERT INTO total_incomes(date_income, total_invoice ,total_income) VALUES ('$date', '$total_invoice','$total_daily_income')";
            $query_run = mysqli_query($conn, $query);

            if($query_run)
            {
                $_SESSION['message'] = "save succesfully";
                header('Location: add-total-income.php');
                exit(0);
            }else
            {
                $_SESSION['message'] = "something went wrong!!";
                header('Location: add-total-income.php');
                exit(0);
            }
}

?>