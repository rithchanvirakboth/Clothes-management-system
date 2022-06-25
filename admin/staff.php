<?php 
    session_start();
    include('authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Staffs</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Staffs</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                        <h3>Staff information</h3>
                        <a href="add-staff.php" class="btn btn-success float-end m-2"> + Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Full name</th>
                                <th>Date of birth</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>start date</th>
                                <th>Type of staff</th>
                                <th>Salary</th>
                                <th>Status</th>
                                <th colspan="2" >Action</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM staffs";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0){

                                        foreach($query_run as $row)
                                        {
                                            ?>
                                <tr>
                                    <td><?= $row['firstname'] .' '. $row['surname']; ?></td>
                                    <td><?= $row['DoB']; ?></td>
                                    <td><?= $row['telephone']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['Address']; ?></td>
                                    <td><?= $row['start_date']; ?></td>
                                    <td>
                                    <?php
                                        if($row['staff_type'] == "0"){
                                            echo "Cashier";
                                        }elseif($row['staff_type'] == "1"){
                                            echo "Caller";
                                        }elseif($row['staff_type'] == "2"){
                                            echo "Chatter";
                                        }elseif($row['staff_type'] == "3"){
                                            echo "Deliver";
                                        }  elseif($row['staff_type'] == "4"){
                                                echo "Other Staff";
                                        }
                                    ?>
                                    </td>
                                    <td><?= $row['salary']; ?>$</td>
                                    <td>
                                    <?php
                                        if($row['status'] == "1"){
                                            echo "Active";
                                        }elseif($row['UserType'] == "0"){
                                            echo "Inactive";
                                        }
                                    ?>
                                    </td>
                                    <td><a href="update-staff.php?id=<?=$row['staff_id']; ?>" class="btn btn-secondary">Edit</a></td>
                                    <td>
                                        <form action="allcode.php" method="POST">
                                            <button type="submit" name="delete_staff" value="<?=$row['staff_id']; ?> " class="btn btn-danger"> Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                <?php
                                        }

                                    }else {
                                        ?>
                                        <tr>
                                            <td colspan="11">No record founded!</td>
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

<?php
    include('includes/footer.php');
    include('includes/script.php');
?>