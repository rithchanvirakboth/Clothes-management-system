<?php 
    session_start();
    include('authentication.php');
    include('includes/header.php');
?>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Total Income</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Total Income</li>
                <li class="breadcrumb-item">Add total income</li>

            </ol>
            <?php require('../message.php'); ?>
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Total Income per day</h3>
                        <a href="total-income.php" class="btn btn-secondary float-end m-2">Back</a>
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
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product name</th>
                                        <th>Unit price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Delivered by</th>
                                    </tr>
                                </thead>
                        <form action="total-income-code.php" method="POST">
                            <tbody>
                            <?php 
                            if(isset($_GET['date']))
                            {
                                $date = $_GET['date'];

                                $query = "SELECT pr.product_name, pr.unit_price, ic.sold_numb, ic.date_income, st.firstname, st.surname, ic.income_amount FROM incomes as ic JOIN staffs as st JOIN products as pr ON ic.staff_id = st.staff_id AND ic.product_id = pr.product_id WHERE date_income = '$date'";  
                                $query_run = mysqli_query($conn, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    $rowcount=mysqli_num_rows($query_run);
                                    foreach($query_run as $row)
                                    {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $row['product_name']; ?>
                                            </td>
                                            <td>
                                                <?= $row['unit_price']; ?>
                                            </td>
                                            <td>
                                                <?= $row['sold_numb']; ?>
                                            </td>
                                            <td>
                                                <?= $row['income_amount']; ?>
                                            </td>
                                            <td>
                                                <?= $row['firstname'] . $row['surname']; ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $totalamount += $row['income_amount'];
                                        }
                                        ?>
                            </tbody>
                                            <input type="hidden" name="total_invoice" value="<?php echo $rowcount; ?>" class="form-control" readonly>
                                            <input type="hidden" name="date" value="<?php echo $row['date_income']; ?>" class="form-control">
                                            <input type="hidden" name="total_daily_income" value="<?php echo $totalamount; ?>" class="form-control">
                                    <center>
                                        <div class="col-md-2 mb-3">
                                            <label style="font-size: 25px; margin-top: 20px;"> Total daily income: </label>
                                            <div class=""><span class="border border-success border-3 rounded" style="display: block; text-align: center; font-size: 30px;"><?php echo "$totalamount" . "$"; ?></span></div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="save" class="btn btn-success">Save Income</button>
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