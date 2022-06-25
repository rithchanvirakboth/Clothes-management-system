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
                        <a href="check-attendance.php" class="btn btn-success float-end m-2"> check attendance</a>
                    </div>
                    <div class="card-body">
                        <form method="GET" onChange="date_model">
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
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>work hour</th>
                                <th>bonus</th>
                                <th>attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(isset($_GET['date']))
                            {
                                $date = $_GET['date'];
                                $query = "SELECT st.surname, st.firstname, st.email, st.telephone, att.date_attendance, att.num_hour, att.bonus, att.status FROM attendances as att JOIN staffs as st ON att.staff_id = st.staff_id WHERE date_attendance='$date'";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                    foreach ($query_run as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $row['firstname'] . $row['surname']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= $row['telephone']; ?></td>
                                            <td><?= $row['num_hour']; ?></td>
                                            <td><?= $row['bonus'] . "$"; ?></td>
                                            <td>
                                                <?php 
                                                if($row['status'] == "0")
                                                {
                                                    echo "<p class='p-1 mb-1 bg-danger text-white text-center'>absent</p>";
                                                }elseif($row['status'] == "1")
                                                { 
                                                    echo "<p class='p-1 mb-1 bg-warning text-white text-center'>Permission</p>";

                                                }elseif($row['status'] == "2")
                                                {
                                                    echo "<p class='p-1 mb-1 bg-success text-white text-center'>Present</p>";
                                                }; 
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }else {
                                    ?>
                                    <tr>
                                        <td colspan="3">No record</td>
                                    </tr>
                                    <?php
                                }
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