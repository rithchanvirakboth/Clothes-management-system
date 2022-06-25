<?php 
    session_start();
    include('authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Total Income</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Total Income</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Total Income information</h3>
                        <a href="add-total-income.php" class="btn btn-success float-end m-2"> + Add</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date income</th>
                                    <th>Total Invoice</th>
                                    <th>Daily Income</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM total_incomes";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0){

                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['date_income']; ?></td>
                                                <td><?= $row['total_invoice']; ?></td>
                                                <td><?= $row['total_income'] . "$"; ?></td>
                                            </tr>
                                            <?php
                                        }

                                    }else {
                                        ?>
                                        <tr>
                                            <td colspan="2">No record founded!</td>
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
        </div>

<?php
    include('includes/footer.php');
    include('includes/script.php');
?>