<?php 

    include('authentication.php');
    include('includes/header.php');

?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <?php
                                $query = "SELECT user_id FROM users ORDER BY user_id";
                                $query_run = mysqli_query($conn, $query);

                                $row = mysqli_num_rows($query_run);

                                if($row <= 1){
                                    echo '<div class="text-center">' .$row. ' user </div>';
                                }else {
                                    echo '<div class="text-center">' .$row. ' users</div>';
                                }
                            ?>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        <?php
                            include "authentication.php";

                            if(isset($_SESSION['auth_role']) && $_SESSION['auth_role'] == '1')
                            {
                                ?>
                            <a class="small text-white stretched-link" href="user.php">View Details</a>
                            <?php
                            }
                            else{
                                ?>
                            <a class="small text-white stretched-link" href="user.php" style="pointer-events: none; cursor: default;">View Details</a>
                                <?php
                            }
                            ?>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">
                        <?php
                                $query = "SELECT staff_id FROM staffs ORDER BY staff_id";
                                $query_run = mysqli_query($conn, $query);

                                $row = mysqli_num_rows($query_run);

                                if($row <= 1){
                                    echo '<div class="text-center">' .$row. ' staff </div>';
                                }else {
                                    echo '<div class="text-center">' .$row. ' staffs</div>';
                                }
                            ?>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="staff.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                        <?php
                                $query = "SELECT payment_id FROM payments ORDER BY payment_id";
                                $query_run = mysqli_query($conn, $query);

                                $row = mysqli_num_rows($query_run);

                                if($row <= 1){
                                    echo '<div class="text-center">' .$row. ' payment </div>';
                                }else {
                                    echo '<div class="text-center">' .$row. ' payments</div>';
                                }
                            ?>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="payment.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <?php
                                $query = "SELECT product_id FROM products ORDER BY product_id";
                                $query_run = mysqli_query($conn, $query);

                                $row = mysqli_num_rows($query_run);

                                if($row <= 1){
                                    echo '<div class="text-center">' .$row. ' product </div>';
                                }else {
                                    echo '<div class="text-center">' .$row. ' products</div>';
                                }
                            ?>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="product.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    include('includes/footer.php');
    include('includes/script.php');
?>