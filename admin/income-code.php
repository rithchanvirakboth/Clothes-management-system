<?php 
include ('authentication.php');

//ADD INCOME 
if(isset($_POST['add-income']))
{
    $product_id = $_POST['product_id'];
    $pnum = $_POST['pnum'];
    $Date = date('Y-m-d', strtotime($_POST['date']));
    $price = $_POST['price'];
    $extra_fee = $_POST['ext_fee'];
    $del_by = $_POST['del_by'];
    $income_amount = $_POST['pnum'] * $_POST['price'];
    $stt = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO incomes(product_id, date_income, sold_numb, extra_fee, income_amount, staff_id, status) VALUES ('$product_id', '$Date', '$pnum', '$extra_fee', '$income_amount', '$del_by', '$stt')";
            $query_run = mysqli_query($conn, $query);

            if($query_run)
            {
                $_SESSION['message'] = "Add succesfully";
                header('Location: income-product.php');
                exit(0);
            }else
            {
                $_SESSION['message'] = "something went wrong!!";
                header('Location: income-product.php');
                exit(0);
            }
}

// PRODUCT DECREASE AFTER DELIIVERED. 

if(isset($_POST['delivered_btn']))
{   
    $income_id = $_POST['income_id'];
    $query = "UPDATE products as pr JOIN incomes as ic ON pr.product_id= ic.product_id SET pr.product_num = pr.product_num - ic.sold_numb WHERE income_id = '$income_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Successfully delivered!";
        header('Location: income.php');
        exit(0);
    }else
    {
        $_SESSION['message'] = "something went wrong!!";
        header('Location: income.php');
        exit(0);
    }
    
}

?>

