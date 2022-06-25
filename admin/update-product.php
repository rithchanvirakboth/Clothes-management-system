<?php 
    include('./authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Product</li>
                <li class="breadcrumb-item">Update</li>

            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Update product</h3>
                    </div>
                    <div class="card-body">

                    <?php 
                            if(isset($_GET['id'])){
                                $product_id = $_GET['id'];
                                $products = "SELECT * FROM products WHERE product_id = $product_id ";
                                $products_run = mysqli_query($conn, $products);

                                if(mysqli_num_rows($products_run) > 0)
                                {
                                    foreach($products_run as $product)
                                    {
                                    
                                    ?>
                            <form action="product-code.php" method="POST">
                                <input type="hidden" name="product_id" value="<?=$product['product_id']; ?>">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">Product name</label>
                                        <input type="text" name="pname" value="<?php echo $product['product_name']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Quantity</label>
                                        <input type="text" name="pnum" value="<?php echo $product['product_num']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Unit Price</label>
                                        <input type="text" name="price" value="<?php echo $product['unit_price']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Color</label>
                                        <input type="text" name="color" value="<?php echo $product['color']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Size</label>
                                        <input type="text" name="size" value="<?php echo $product['size']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Brand</label>
                                        <input type="text" name="brand" value="<?php echo $product['brand']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p><label for="">Description</label></p>
                                        <!-- <input type="text" name="desc" value="<?php echo $product['description']; ?>" class="form-control"> -->
                                        <textarea id="text" name="desc" rows="4" cols="50"><?php echo $product['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="update_product" class="btn btn-success">Update product</button>
                                        <a href="javascript:window.history.back();" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </form>
                            
                        <?php
                                    }
                                }   
                                else
                                {
                                    ?>
                                    <h4>No record founded!!</h4>
                                    <?php
                                }
                            }
                        ?>
                        


                    </div>
                </div>
            </div>

            </div>
        </div>

<?php
    include('includes/footer.php');
    include('includes/script.php');
?>