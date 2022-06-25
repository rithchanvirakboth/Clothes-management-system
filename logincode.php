<?php 
    session_start();
    include('./admin/config/dbconfig.php');

    if(isset($_POST['login_btn'])){

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";

        $login_query_run = mysqli_query($conn, $login_query);

        if(mysqli_num_rows($login_query_run) > 0){

            foreach($login_query_run as $data) {
                $user_id = $data['user_id'];
                $Fullname = $data['Fullname'];
                $username = $data['username'];
                $user_email = $data['email'];
                $role = $data['UserType'];
            }
            $_SESSION['auth'] = true; 
            $_SESSION['auth_role'] = "$role"; // 1 = admin, 0 = user
            $_SESSION['auth_user'] = [
                'user_id'=>$user_id,
                'username'=>$username, 
                'user_email'=>$user_email,
            ];
            
            if($_SESSION['auth_role'] == '1') //admin
            {
                $_SESSION['message'] = "Welcome to dashboard";
                header("Location: ./admin/index.php");
                exit(0);    
            }elseif($_SESSION['auth_role'] == '0') // user
            {
                $_SESSION['message'] = "welcome to dashboard";
                header("Location: ./admin/index.php");
                exit(0);
            }
        }else {
            $_SESSION['message'] = "Invalid Email or password!";
            header("Location: login.php");
            exit(0);
        }

    }else {
        $_SESSION['message'] = "You are not allowed to access into this page!";
        header("Location: login.php");
        exit(0);
    }

?>