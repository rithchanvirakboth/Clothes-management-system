<?php 
    session_start();
    include('authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Income</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Income</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Income information</h3>
                        <a href="income-product.php" class="btn btn-success float-end m-2"> + Add</a>
                        <a href="income-filter.php" class="btn btn-primary float-end m-2"> Filter</a>
                    </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Product name</td>
                                    <td>Quantity</td>
                                    <td>Price per unit</td>
                                    <td>Total</td>
                                    <td>Date income</td>
                                    <td>Delivered by</td>
                                    <td>Status</td>
                                    <td>Check Delivered</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT ic.income_id, pr.product_name, pr.unit_price, pr.product_num, st.firstname, st.surname, ic.date_income, ic.sold_numb, ic.extra_fee, ic.income_amount, ic.status 
                                    FROM incomes as ic JOIN products as pr JOIN staffs as st ON ic.product_id = pr.product_id AND ic.staff_id = st.staff_id ORDER BY income_id ASC";  
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0){

                                        foreach($query_run as $row)
                                        {
                                ?>
                                <tr>
                                    <td><?= $row['income_id']; ?></td>
                                    <td><?= $row['product_name']; ?></td>
                                    <td><?= $row['sold_numb']; ?></td>
                                    <td><?= '$ ' . $row['unit_price']; ?></td>
                                    <td><?= '$ ' .$row['income_amount']; ?></td>
                                    <td><?= $row['date_income']; ?></td>
                                    <td><?= $row['firstname'] . $row['surname']; ?></td>
                                    <td>
                                        <?php
                                            if($row['status'] == "0"){
                                                echo "<p class='p-1 mb-1 bg-danger text-white text-center'>Not Delivered</p>";
                                            }elseif($row['status'] == "1"){
                                                echo "<p class='p-1 mb-1 bg-success text-white text-center'>Delivered</p>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <form action="income-code.php" method="POST">
                                                <?php
                                                    if($row['status'] == "0"){
                                                    
                                                    ?>
                                                        <a href="income-status.php?id=<?=$row['income_id'] . $date; ?>" class="btn btn-success">Get Delivered</a>
                                                    <?php
                                                    }
                                                    elseif($row['status'] == "1"){
                                                        
                                                    ?>
                                                        <a href="" class="btn btn-secondary disabled" >Get Delivered</a>
                                                    <?php 
                                                    }
                                                ?>
                                        </form>
                                    </td>
                                </tr>

                                <?php
                                        }

                                    }else {
                                        ?>
                                        <tr>
                                            <td colspan="7">No record founded!</td>
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