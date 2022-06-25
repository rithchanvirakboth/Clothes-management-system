<?php 
    session_start();
    include('authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Payment</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Payment</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Payment information</h3>
                        <a href="select-staffs.php" class="btn btn-success float-end m-2"> + Add</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Staff id</th>
                                <th>Staff name</th>
                                <th>Email</th>
                                <th>date payment</th>
                                <th>Payment amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT st.staff_id, st.surname, st.firstname, st.email, pm.date_payment, pm.payment_amount FROM payments as pm JOIN staffs as st ON pm.staff_id = st.staff_id";
                                $query_run = mysqli_query($conn, $query);
                                
                                if(mysqli_num_rows($query_run) > 0){

                                    foreach($query_run as $row)
                                    {   
                                        $date = $row['date_payment'];
                                        $newdate = date('d-M-Y', strtotime($date))
                                        ?>
                            <tr>
                                <td> <?= $row['staff_id']; ?></td>
                                <td><?= $row['firstname'] . $row['surname']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td> <?= $newdate; ?></td>
                                <td> <?= $row['payment_amount'] . "$"; ?></td>
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