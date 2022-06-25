<?php
    include('authentication.php');

    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT ic.status, pr.product_num, ic.sold_numb FROM incomes as ic JOIN products as pr WHERE income_id=$id");
    $row = mysqli_fetch_array($query);
    
    if($row['status'] == "0")
    {
        mysqli_query($conn, "UPDATE incomes JOIN products ON incomes.product_id = products.product_id SET incomes.status= '1', products.product_num = products.product_num - incomes.sold_numb WHERE income_id=$id");
        
        if($row['product_num'] <= '0')
        {
            $_SESSION['message'] = "Out of stock!!";
            header('Location: income.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "successfully delivered";
            header('Location: income.php');
            exit(0);
        }
    }
    if($row['status'] == "1"){
        mysqli_query($conn, "Insert");
    }
?>