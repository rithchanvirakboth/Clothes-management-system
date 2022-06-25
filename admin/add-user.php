<?php 
    include('./authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Users</li>
                <li class="breadcrumb-item">Add</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                <?php require('../message.php'); ?>


                    <div class="card-header">
                        <h3>Create user</h3>
                    </div>
                    <div class="card-body">

                    <form action="code.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">First name</label>
                                    <input type="text" name="Fullname"  class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email"  class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="PhoneNum" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Address</label>
                                    <input type="text" name="Address" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Role: </label>
                                    <select name="UserType" required class="form-control">
                                        <option value="">--Select role--</option>
                                        <option value="1">admin</option>
                                        <option value="0">User</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Status: </label>
                                        <input type="checkbox" name="status" width="70px" height="70px">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="create_user" class="btn btn-success">Create</button>
                                    <a href="user.php" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                    </form>

                    </div>
            </div>

            </div>
        </div>

<?php
    include('includes/footer.php');
    include('includes/script.php');
?>