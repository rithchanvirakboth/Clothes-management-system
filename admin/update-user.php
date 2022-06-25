<?php 
    include('./authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Users</li>
                <li class="breadcrumb-item">Update</li>

            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Update user</h3>
                    </div>
                    <div class="card-body">

                        <?php 
                            if(isset($_GET['id'])){
                                $user_id = $_GET['id'];
                                $users = "SELECT * FROM users WHERE user_id= $user_id";
                                $users_run = mysqli_query($conn, $users);

                                if(mysqli_num_rows($users_run) > 0)
                                {
                                    foreach($users_run as $user)
                                    {
                                            
                                    
                                    ?>

                                    
                                    
                        <form action="code.php" method="POST">
                            <input type="hidden" name="user_id" value="<?=$user['user_id']; ?>">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">First name</label>
                                    <input type="text" name="Fullname" value="<?php echo $user['Fullname']; ?>" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Username</label>
                                    <input type="text" name="username" value="<?php echo $user['username']; ?>" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="<?php echo $user['email']; ?>" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="PhoneNum" value="<?php echo $user['PhoneNum']; ?>" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Address</label>
                                    <input type="text" name="Address" value="<?php echo $user['Address']; ?>" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Role: </label>
                                    <select name="UserType" required class="form-control">
                                        <option value="">--Select role--</option>
                                        <option value="1" <?=$user['UserType'] == '1' ? 'selected':'' ?> >admin</option>
                                        <option value="0" <?=$user['UserType'] == '0' ? 'selected':'' ?> >User</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Status: </label>
                                        <input type="checkbox" name="status" <?=$user['status'] == '1' ? 'checked':'' ?> width="70px" height="70px">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="update_user" class="btn btn-success">Update user</button>
                                    <a href="javascript:window.history.back();" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                        
                        <?php
                                    }
                                }   
                                else
                                {
                                    ?>
                                    <h4>No record founded!!</h4>
                                    <?php
                                }
                            }
                        ?>
                        

                    </div>
                </div>
            </div>

            </div>
        </div>

<?php
    include('includes/footer.php');
    include('includes/script.php');
?>