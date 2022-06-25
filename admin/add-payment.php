<?php 
    include('./authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Payment</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Payment</li>
                <li class="breadcrumb-item active">Select staffs</li>
                <li class="breadcrumb-item">Add payment</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <?php require('../message.php'); ?>

                            <div class="card-header">
                                <h3>Add payment</h3>
                                <a href="total-income.php" class="btn btn-secondary float-end m-2">Back</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Staff name</th>
                                            <th>Email</th>
                                            <th>Salary</th>
                                            <th>Total Bonus</th>
                                            <th>Total extra fee</th>
                                            <th>Date payment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(isset($_POST['id'], $_POST['date'])){
                                            $staff_id = $_POST['id']; 
                                            $date = $_POST['date'];   

                                            $query = "SELECT staff_id, firstname, surname, email, salary  FROM staffs WHERE staff_id = '$staff_id'";  
                                            $query_run = mysqli_query($conn, $query);
            
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                            
                                        ?>
                                    <form action="total_payment_code.php" method="POST">
                                    <input type="hidden" name="staff_id" value="<?=$row['staff_id']; ?>">
                                        <tbody>
                                                <tr>
                                                    <td>
                                                        <?= $row['staff_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['firstname'] . $row['surname']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['salary'] . "$"; ?>
                                                        <input type="hidden" name="salary" value="<?= $row['salary'] . "$"; ?>" class="form-control">
                                                    </td>
                                                    <td class="col-md-2 mb-3">
                                                        <?php
                                                            $select = "SELECT * FROM total_bonus WHERE staff_id = '$staff_id' AND date_payment = '$date'";
                                                            $sql_run = mysqli_query($conn, $select);

                                                            $row = (mysqli_fetch_assoc($sql_run));
                                                            if($row['total_bonus'] == NULL){
                                                                echo  "0$";
                                                                ?>
                                                                <input type="hidden" name="totalbonus" value="0$" class="form-control">
                                                                <?php
                                                            }else{
                                                                echo  $row['total_bonus'] . "$";
                                                                ?>
                                                                <input type="hidden" name="totalbonus" value="<?=$row['total_bonus'] . "$"; ?>" class="form-control">
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="col-md-2 mb-3">
                                                        <?php
                                                            $select = "SELECT total_fee FROM total_fee WHERE staff_id = '$staff_id'";
                                                            $sql_run = mysqli_query($conn, $select);

                                                            $row = (mysqli_fetch_assoc($sql_run));
                                                            if($row['total_fee'] == NULL){
                                                                echo  "0$";
                                                                ?>
                                                                <input type="hidden" name="totalfee" value="0$" class="form-control">
                                                                <?php
                                                            }else{
                                                                echo  $row['total_fee'] . "$";
                                                                ?>
                                                                <input type="hidden" name="totalfee" value="<?=$row['total_fee'] . "$"; ?>" class="form-control">
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="col-md-2 mb-3">
                                                        <?php 
                                                            $newdate = date('d-M-Y', strtotime($date));
                                                            echo $newdate;
                                                        ?>
                                                        <input type="hidden" name="date" value="<?php echo $date; ?>" class="form-control">
                                                    </td>
                                                </tr>
                                            <?php
                                                }
                                                ?>
                                        </tbody>
                                        
                                                <center>
                                                    <div class="col-md-12 mb-3">
                                                        <button type="submit" name="save" class="btn btn-success">Save payment</button>
                                                    </div>
                                                </center>
                                                <?php
                                                }else {
                                                    ?>
                                                    <div> No record found !!</div>
                                                <?php
                                                }
                                            }
                                            ?>
                                    </form>
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