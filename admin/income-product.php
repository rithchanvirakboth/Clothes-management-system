<?php 
    include('./authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add income</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Income</li>
                <li class="breadcrumb-item">Select product</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <?php require('../message.php'); ?>

                        <div class="card-header">
                            <h3>Income information</h3>
                            <a href="income.php" class="btn btn-secondary float-end m-2">Go Back</a>
                        </div>
                            <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Product name</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $product = "SELECT * FROM products";
                                    $product_run = mysqli_query($conn, $product);

                                    if(mysqli_num_rows($product_run) > 0){

                                        foreach($product_run as $row)
                                        {
                                            ?>
                                    <tr>
                                        <td><?= $row['product_name']; ?></td>
                                        <td><a href="add-income.php?id=<?=$row['product_id']; ?>" class="btn btn-success">Next</a></td>
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