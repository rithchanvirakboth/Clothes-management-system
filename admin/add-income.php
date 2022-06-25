<?php 
    include('./authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add income</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Income</li>
                <li class="breadcrumb-item active">Select product</li>
                <li class="breadcrumb-item">Add</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <?php require('../message.php'); ?>

                            <div class="card-header">
                                <h3>Add income</h3>
                            </div>
                            <div class="card-body">

                            <?php 
                            if(isset($_GET['id'])){
                                $product_id = $_GET['id'];
                                $products = "SELECT * FROM products WHERE product_id= $product_id";
                                $product_run = mysqli_query($conn, $products);

                                if(mysqli_num_rows($product_run) > 0)
                                {
                                    foreach($product_run as $product)
                                    {
                                    ?>
                            
                            <form action="income-code.php" method="POST">
                            <input type="hidden" name="product_id" value="<?=$product['product_id']; ?>">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">Product name</label>
                                        <input type="text" name="pname" value="<?php echo $product['product_name']; ?>" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Quantity</label>
                                        <input type="number" min="<?php if($product['product_num'] <= '0') { echo "0"; }else{ echo "1"; }?>" max="<?=$product['product_num']; ?>" name="pnum" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Income Date</label>
                                        <input type="date" name="date" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Unit price</label>
                                        <input type="text" name="price" value="<?php echo $product['unit_price'] . "$"; ?>" class="form-control" readonly="readonly">
                                    </div>
                                    <?php 
                                        $staff = "SELECT * FROM staffs";
                                        $staff_run = mysqli_query($conn, $staff);

                                        if(mysqli_num_rows($staff_run) > 0)
                                        {
                                            ?>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Delivered by: </label>
                                                <select name="del_by" id="" class="form-control" required>
                                                    <option value="0">select option: </option>
                                                    <?php
                                                        foreach($staff_run as $row)
                                                        {
                                                        ?> 
                                                    <option value="<?php echo $row['staff_id']; ?>"><?php echo $row['firstname'] . $row['surname']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php 
                                        }else
                                        {
                                            echo "No data availabe!";
                                        }
                                        ?>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Extra fee</label>
                                        <input type="text" name="ext_fee" class="form-control" required>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="add-income" class="btn btn-success">add</button>
                                        <a href="income-product.php" class="btn btn-secondary">Cancel</a>
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