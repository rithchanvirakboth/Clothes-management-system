<?php 
    session_start();
    include('authentication.php');
    include('includes/header.php');
    if($_SESSION['auth_role'] != "1" ){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> You are not authorized as ADMIN! 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['message']);
        die(0);
    }
?>          
        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Users</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>User information</h3>
                        <a href="add-user.php" class="btn btn-success float-end m-2"> + Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Full name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Role</th>
                                    <th>Address</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM users";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0){

                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['Fullname']; ?></td>
                                                <td><?= $row['username']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['PhoneNum']; ?></td>
                                                <td>
                                                    <?php
                                                        if($row['UserType'] == "1"){
                                                            echo "Admin";
                                                        }elseif($row['UserType'] == "0"){
                                                            echo "User";
                                                        }
                                                    ?>
                                                </td>
                                                <td><?= $row['Address']; ?></td>
                                                <td><a href="update-user.php?id=<?=$row['user_id']; ?>" class="btn btn-secondary">Edit</a></td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <button type="submit" name="delete_user" value="<?=$row['user_id']; ?> " class="btn btn-danger"> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }

                                    }else {
                                        ?>
                                        <tr>
                                            <td colspan="5">No record founded!</td>
                                        </tr>
                                    <?php
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            </div>
        </div>

<?php
    include('includes/footer.php');
    include('includes/script.php');
?>