<?php 
    include('authentication.php');


    //CREATE user
    if(isset($_POST['create_user'])){
        
        $Fullname = $_POST['Fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $PhoneNum = $_POST['PhoneNum'];
        $Address = $_POST['Address'];
        $UserType = $_POST['UserType'];
        $Status = $_POST['status'] == true ? '1':'0';
        
        $checkemail = "SELECT email FROM users WHERE email = '$email'";
            $checkemail_run = mysqli_query($conn, $checkemail);

            if(mysqli_num_rows($checkemail_run) > 0)
            {
                // already exist
                $_SESSION['message']= "email already exist !";
                header("Location: add-user.php");
                exit(0);
            }
            else{
                        
            $query = "INSERT INTO users (Fullname, username, email, password, PhoneNum, Address, UserType, status) VALUES ('$Fullname','$username','$email','$password','$PhoneNum',
            '$Address','$UserType','$Status')";

            $query_run = mysqli_query($conn, $query);

                if($query_run)
                {   
                    $_SESSION['message'] = "User created successfully!";
                    header("Location: user.php");
                    exit(0);
                }
                else {
                    $_SESSION['message'] = "Something went wrong!";
                    header("Location: add-user.php");
                    exit(0);
                }
            }
        
    }

    // UPDATE user
    if(isset($_POST['update_user']))
    {
        $user_id = $_POST['user_id'];
        $Fullname = $_POST['Fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $PhoneNum = $_POST['PhoneNum'];
        $Address = $_POST['Address'];
        $UserType = $_POST['UserType'];
        $Status = $_POST['status'] == true ? '1':'0';

        $query = "UPDATE users SET Fullname='$Fullname', username ='$username', email='$email', PhoneNum='$PhoneNum', Address='$Address', UserType='$UserType', Status='$Status'
                    WHERE user_id = '$user_id' ";

        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['message'] = "Updated Successfully";
            header("Location: user.php");
            exit(0);
        }

    }
        // DELETE user

        if(isset($_POST['delete_user'])){
            $user_id = $_POST['delete_user'];

            $query = "DELETE FROM users WHERE user_id='$user_id' ";
            $query_run = mysqli_query($conn, $query);

            if($query_run) {
                
                $_SESSION['message'] = "User deleted successfully";
                header("Location: user.php");
                exit(0); 

            }else{
                $_SESSION['message'] = "Something went wrong!!";
                header("Location: user.php");
                exit(0);
            }
        }
        
?>