<?php 
    include('authentication.php');

        // Check attendance 
        if(isset($_POST['save_payment']))
        {   
            $id = $_POST['staff_id'];
            $date = $_POST['date'];
            $salary = $_POST['salary'];
            $totalfee = $_POST['extra_fee'];
            $totalbonus = $_POST['Bonus'];
            
            foreach ($_POST['id'] as $key => $val){
                // do the calc here
                $total_payment = $_POST['salary'][$key] +
                                $_POST['extra_fee'][$key] + 
                                $_POST['Bonus'][$key];

                $query = "INSERT INTO payments(staff_id, date_payment, payment_amount) VALUES ('".$value ."', '".$staff_id[$key]. "', '".$date[$key]."', '". $total_payment."')";
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
        }


    ?>