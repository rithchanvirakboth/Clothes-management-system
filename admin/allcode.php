<?php 
    include('authentication.php');


    
        // CREATE Staff 
        if(isset($_POST['create_staff']))
        {
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];
            $DoB = date('Y-m-d', strtotime($_POST['DoB']));
            $email = $_POST['email'];
            $telephone = $_POST['tel'];
            $Address = $_POST['address'];
            $sdate = date('Y-m-d', strtotime($_POST['sdate']));
            $salary = $_POST['salary'];
            $staff_type = $_POST['stype'];
            $Status = $_POST['status'] == true ? '1':'0' ;

            $query = "INSERT INTO staffs(firstname, surname, DoB, email, telephone, Address, start_date, salary, staff_type, status) VALUES ('$firstname', '$lastname', '$DoB', '$email', '$telephone', '$Address', '$sdate', '$salary', '$staff_type', '$Status' )";
            $query_run = mysqli_query($conn, $query);

            if($query_run)
            {
                $_SESSION['message'] = "created staff succesfully";
                header('Location: add-staff.php');
                exit(0);
            }else
            {
                $_SESSION['message'] = "something went wrong!!";
                header('Location: add-staff.php');
                exit(0);
            }

        }
        

    // UPDATE Staff

    if(isset($_POST['update_staff']))
    {
        $staff_id = $_POST['staff_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['surname'];
        $DoB = date('Y-m-d', strtotime($_POST['DoB']));
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $Address = $_POST['Address'];
        $sdate = date('Y-m-d', strtotime($_POST['sdate']));
        $salary = $_POST['salary'];
        $staff_type = $_POST['staff_type'];
        $Status = $_POST['status'] == true ? '1':'0';

        $query = "UPDATE staffs SET firstname='$firstname', surname ='$lastname', DoB='$DoB', email='$email', telephone='$telephone', Address='$Address', start_date='$sdate', salary='$salary', staff_type='$staff_type', status='$Status'
                    WHERE staff_id = '$staff_id' ";

        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['message'] = "Updated Successfully";
            header("Location: staff.php");
            exit(0);
        }

    }

    // DELETE Staff

    if(isset($_POST['delete_staff'])){
        $staff_id = $_POST['delete_staff'];

        $query = "DELETE FROM staffs WHERE staff_id='$staff_id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run) {
            
            $_SESSION['message'] = "Staff deleted successfully";
            header("Location: staff.php");
            exit(0); 

        }else{
            $_SESSION['message'] = "Something went wrong!!";
            header("Location: staff.php");
            exit(0);
        }
    }
?>