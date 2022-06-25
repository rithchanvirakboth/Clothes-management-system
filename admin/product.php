<?php 
    session_start();
    include('authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Products</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item">Products</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Product information</h3>
                        <a href="add-product.php" class="btn btn-success float-end m-2"> + Add</a>
                    </div>

                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Description</th>
                                    <th>Brand</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM products";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0){

                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['product_name']; ?></td>
                                                <td>
                                                    <?php 
                                                    if($row['product_num'] > '0'){
                                                        echo $row['product_num'];
                                                    }
                                                    elseif($row['product_num'] <= '0') {
                                                        echo "out of stock";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $row['unit_price'] . '$'; ?></td>
                                                <td><?= $row['color']; ?></td>
                                                <td><?= $row['size']; ?></td>
                                                <td><?= $row['description']; ?></td>
                                                <td><?= $row['brand']; ?></td>
                                                <td><a href="update-product.php?id=<?=$row['product_id']; ?>" class="btn btn-secondary">Update</a></td>
                                                <td>
                                                    <form action="product-code.php" method="POST">
                                                        <button type="submit" name="delete_product" value="<?=$row['product_id']; ?> " class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }

                                    }else {
                                        ?>
                                        <tr>
                                            <td colspan="9">No record founded!</td>
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