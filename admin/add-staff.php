<?php 
    include('./authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Staffs</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Staff</li>
                <li class="breadcrumb-item">Add</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                <?php require('../message.php'); ?>


                    <div class="card-header">
                        <h3>Create Staff</h3>
                    </div>
                    <div class="card-body">

                        <form action="allcode.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">First name</label>
                                        <input type="text" name="fname"  class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Last name</label>
                                        <input type="text" name="lname" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Date of birth</label>
                                        <input type="date" name="DoB" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Telephone</label>
                                        <input type="text" name="tel"  class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Start date</label>
                                        <input type="date" name="sdate" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Type: </label>
                                        <select name="stype" required class="form-control">
                                            <option value="">--Select role--</option>
                                            <option value="0">Cashier</option>
                                            <option value="1">Caller</option>
                                            <option value="2">Chatter</option>
                                            <option value="3">Deliver</option>                                        
                                            <option value="4">Other Staff</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Salary</label>
                                        <input type="text" name="salary"  class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Status: </label>
                                            <input type="checkbox" name="status" width="70px" height="70px">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="create_staff" class="btn btn-success">Create</button>
                                        <a href="staff.php" class="btn btn-secondary">Cancel</a>
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