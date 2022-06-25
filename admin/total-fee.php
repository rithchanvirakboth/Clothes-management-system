<?php 
    session_start();
    include('authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Total Extra fee</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Total Extra fee</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Total Extra fee information</h3>
                        <a href="add-total-fee.php" class="btn btn-success float-end m-2"> + Add</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Staff name</th>
                                <th>Email</th>
                                <th>date payment</th>
                                <th>Total Bonus</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT st.surname, st.firstname, st.email, tb.date_payment, tb.total_bonus From staffs as st JOIN total_bonus as tb ON st.staff_id = tb.staff_id";
                                $query_run = mysqli_query($conn, $query);
                                
                                if(mysqli_num_rows($query_run) > 0){

                                    foreach($query_run as $row)
                                    {
                                        ?>
                            <tr>
                                <td> <?= $row['firstname'] . $row['surname']; ?></td>
                                <td> <?= $row['email']; ?></td>
                                <td> <?= $row['date_payment']; ?></td>
                                <td> <?= $row['total_bonus'] . "$"; ?></td>
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

<?php
    include('includes/footer.php');
    include('includes/script.php');
?>