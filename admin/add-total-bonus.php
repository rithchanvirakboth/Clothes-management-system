<?php 
    session_start();
    include('authentication.php');
    include('includes/header.php');
?>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Total Bonus</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Total Bonus</li>
                <li class="breadcrumb-item">Add total Bonus</li>

            </ol>
            <?php require('../message.php'); ?>
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Total Bonus per month</h3>
                        <a href="total-bonus.php" class="btn btn-secondary float-end m-2">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="GET" onChange="date_model">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <input type="date" name="todate" value="<?php if(isset($_GET['todate'])){ echo $_GET['todate']; } ?>" class="form-control" id="date_model">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="date" name="fromdate" value="<?php if(isset($_GET['fromdate'])){ echo $_GET['fromdate']; } ?>" class="form-control" id="date_model">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <input type="submit" class="btn btn-warning" value="Filter">
                                </div>
                            </div>
                        </form>
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Staff name</th>
                                        <th>Email</th>
                                        <th>Date payment</th>
                                        <th>Total bonus</th>
                                    </tr>
                                </thead>
                        <form action="total_bonus_code.php" method="POST">
                            <tbody>
                            <?php 
                            if(isset($_GET['todate']) && isset($_GET['fromdate']))
                            {
                                $todate = $_GET['todate'];
                                $fromdate = $_GET['fromdate'];

                                $query = "SELECT sum(att.bonus) as totalbonus, att.staff_id, st.surname, st.firstname, st.email FROM attendances as att JOIN staffs as st ON att.staff_id = st.staff_id WHERE date_attendance BETWEEN '$todate' AND '$fromdate' GROUP BY staff_id";  
                                $query_run = mysqli_query($conn, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    $rowcount=mysqli_num_rows($query_run);
                                    foreach($query_run as $row)
                                    {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $row['firstname'] . $row['surname']; ?>
                                            </td>
                                            <td>
                                                <?= $row['email']; ?>
                                            </td>
                                            <td>
                                                <input type="date" value="<?php echo $fromdate; ?>" class="form-control" readonly>
                                            </td>
                                            <td>
                                                <?= $row['totalbonus'] . "$"; ?>
                                            </td>
                                        </tr>
                                        <input type="text" name="staff_id[]" value="<?=$row['staff_id']; ?>" class="form-control">
                                        <input type="text" name="totalbonus[]" value="<?=$row['totalbonus']; ?>" class="form-control">
                                        <input type="text" name="date[]" value="<?php echo $fromdate; ?>" class="form-control">

                                    <?php
                                        }
                                        ?>
                            </tbody>
                            
                                    <center>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="save" class="btn btn-success">Save Total Bonus</button>
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
        </div>

<?php
    include('includes/footer.php');
    include('includes/script.php');
?>