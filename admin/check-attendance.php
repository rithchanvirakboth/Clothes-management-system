<?php 
    session_start();
    include('authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Attendance</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Attendance</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Attendance record</h3>
                            <a href="attendance.php" class="btn btn-primary float-end m-2"> View attendance</a>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <input type="date" name="date" value="<?php if(isset($_GET['date'])){ echo $_GET['date']; } ?>" class="form-control" id="date_model">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="submit" class="btn btn-warning" value="Filter">
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Staff name</th>
                                        <th>Email</th>
                                        <th>Work hour</th>
                                        <th>Date</th>
                                        <th>Bonus</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                            <form action="attendance-code.php" method="POST">
                                <tbody>
                                    <?php 
                                    if(isset($_GET['date']))
                                    {
                                        $date = $_GET['date'];

                                        $query = "SELECT * FROM staffs";  
                                        $query_run = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($query_run) > 0){

                                            foreach($query_run as $row)
                                            {
                                                if($row['start_date'] <= $date){

                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $row['firstname'] . $row['surname']; ?>
                                                </td>    
                                                <td>
                                                    <?= $row['email']; ?>
                                                </td>
                                                <td class="col-md-2 mb-3">
                                                    <select name="work_hour[]" class="form-control">
                                                        <option value="0">0 hours</option>
                                                        <option value="2">2 hours</option>
                                                        <option value="4">4 hours</option>
                                                        <option value="6">6 hours</option>
                                                        <option value="8">8 hours</option>
                                                        <option value="10">10 hours</option>
                                                    </select>
                                                </td>
                                                <td class="col-md-2 mb-3">
                                                <input type="hidden" name="id[]" value="<?= $row['staff_id']; ?>" class="form-control">
                                                <input type="date" name="date[]" value="<?php echo $date; ?>" class="form-control" readonly>
                                                </td>
                                                <td class="col-md-2 mb-3">
                                                <input type="text" name="bonus[]" class="form-control">
                                                <!-- <span style="color: red; font:italic; font-size:14px;">note: only bonus for Overtime</span> -->
                                                </td>
                                                <td class="col-md-2 mb-3">
                                                    <select name="status[]" class="form-control">
                                                        <option value="0">Absent</option>
                                                        <option value="1">Permission</option>
                                                        <option value="2">Present</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php
                                                }   
                                            }
                                            ?>
                                </tbody>
                                            <center>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" name="save_att" class="btn btn-success">Save Attendance</button>
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