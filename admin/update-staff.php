<?php 
    include('./authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Staffs</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Staffs</li>
                <li class="breadcrumb-item">Update</li>

            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Update staffs</h3>
                    </div>
                    <div class="card-body">

                    <?php 
                            if(isset($_GET['id'])){
                                $staff_id = $_GET['id'];
                                $staffs = "SELECT * FROM staffs WHERE staff_id= $staff_id";
                                $staffs_run = mysqli_query($conn, $staffs);

                                if(mysqli_num_rows($staffs_run) > 0)
                                {
                                    foreach($staffs_run as $staff)
                                    {
                                            
                                    
                                    ?>
                            <form action="allcode.php" method="POST">
                                <input type="hidden" name="staff_id" value="<?=$staff['staff_id']; ?>">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">First name</label>
                                        <input type="text" name="firstname" value="<?php echo $staff['firstname']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Last name</label>
                                        <input type="text" name="surname" value="<?php echo $staff['surname']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Date of birth</label>
                                        <input type="date" name="DoB" value="<?php echo $staff['DoB']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="<?php echo $staff['email']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="telephone" value="<?php echo $staff['telephone']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Address</label>
                                        <input type="text" name="Address" value="<?php echo $staff['Address']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Start date</label>
                                        <input type="date" name="sdate" value="<?php echo $staff['start_date']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Salary</label>
                                        <input type="text" name="salary"  class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Type: </label>
                                        <select name="staff_type" required class="form-control">
                                            <option value="">--Select type--</option>
                                            <option value="0" <?=$staff['staff_type'] == '0' ? 'selected':'' ?> >Cashier</option>
                                            <option value="1" <?=$staff['staff_type'] == '1' ? 'selected':'' ?> >Caller</option>
                                            <option value="2" <?=$staff['staff_type'] == '2' ? 'selected':'' ?> >Chatter</option>
                                            <option value="3" <?=$staff['staff_type'] == '3' ? 'selected':'' ?> >Deliver</option>
                                            <option value="4" <?=$staff['staff_type'] == '4' ? 'selected':'' ?> >Other Staffs</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Status: </label>
                                            <input type="checkbox" name="status" <?=$staff['status'] == '1' ? 'checked':'' ?> width="70px" height="70px">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="update_staff" class="btn btn-success">Update staff</button>
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