<?php 
    include('authentication.php');

        // Check attendance 
        if(isset($_POST['save_att']))
        {   
            $work_hour = $_POST['work_hour'];
            $staff_id = $_POST['id'];
            $date = $_POST['date'];
            $bonus = $_POST['bonus'];
            $status = $_POST['status'];
            
            foreach ($staff_id as $key => $value){
                $query = "INSERT INTO attendances(staff_id, date_attendance, num_hour, bonus, status) VALUES ('".$value ."', '".$date[$key]. "', '".$work_hour[$key]."', '". $bonus[$key]."', '". $status[$key]."')";
                $query_run = mysqli_query($conn, $query);
            }
            if($query_run){
                $_SESSION['message'] = "save attendance succesfully";
                header('Location: attendance.php');
                exit(0);
            }else
            {
                $_SESSION['message'] = "something went wrong!!";
                header('Location: check-attendance.php');
                exit(0);
            }
        }


    ?>