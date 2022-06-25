<?php 
    include('./authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Products</li>
                <li class="breadcrumb-item">Add</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <?php require('../message.php'); ?>

                            <div class="card-header">
                                <h3>Create products</h3>
                            </div>
                            <div class="card-body">

                                <form action="product-code.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Product name</label>
                                            <input type="text" name="pname"  class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Quantity</label>
                                            <input type="text" name="pnum" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Unit price</label>
                                            <input type="text" name="price" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Color</label>
                                            <input type="text" name="color"  class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Size</label>
                                            <input type="text" name="size" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Brand</label>
                                            <input type="text" name="brand" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <p><label for="">Description</label></p>
                                            <textarea id="text" name="description" rows="4" cols="50"></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="create_product" class="btn btn-success">Create</button>
                                            <a href="product.php" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    include('includes/footer.php');
    include('includes/script.php');
?>