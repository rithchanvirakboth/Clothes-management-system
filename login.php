<?php 
session_start();

if(isset($_SESSION['auth'])){
    if(!isset($_SESSION['message'])){
        $_SESSION['message'] = "You are already logged in";
    }
    header("Location: index.php");
    exit(0);
}

include('./includes/header.php');

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

            <?php include('./message.php'); ?>

                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                        <div class="card-body">

                            <form action="logincode.php" method="POST">
                                <div class="form-group mb-3">
                                    <label> Email </label>
                                    <input type="email" name="email" placeholder="Enter your email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label> Password </label>
                                    <input type="password" name="password" placeholder="Enter your password" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="login_btn" class="btn btn-success">Login</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('./includes/footer.php');
?>