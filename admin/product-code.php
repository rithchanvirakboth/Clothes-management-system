<?php 
    include('authentication.php');


    
        // CREATE Products 
        if(isset($_POST['create_product']))
        {
            $pname = $_POST['pname'];
            $pnum = $_POST['pnum'];
            $price = $_POST['price'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $description = $_POST['description'];
            $brand = $_POST['brand'];

            $query = "INSERT INTO products (product_name, product_num, unit_price, color, size, description, brand) VALUES ('$pname', '$pnum', '$price', '$color', '$size', '$description', '$brand')";
            $query_run = mysqli_query($conn, $query);

            if($query_run)
            {
                $_SESSION['message'] = "created product succesfully";
                header('Location: add-product.php');
                exit(0);
            }else
            {
                $_SESSION['message'] = "something went wrong!!";
                header('Location: add-product.php');
                exit(0);
            }

        }
        
        // UPDATE products

        if(isset($_POST['update_product']))
        {   
            $product_id = $_POST['product_id'];
            $pname = $_POST['pname'];
            $pnum = $_POST['pnum'];
            $price = $_POST['price'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $desc = $_POST['desc'];
            $brand = $_POST['brand'];

            $query = "UPDATE products SET product_name='$pname', product_num ='$pnum', unit_price='$price', color='$color', size='$size', description='$desc', brand='$brand' 
                        WHERE product_id = '$product_id' ";

            $query_run = mysqli_query($conn, $query);

            if($query_run)
            {
                $_SESSION['message'] = "Updated Successfully";
                header("Location: product.php");
                exit(0);
            }else{
                $_SESSION['message'] = "Something went wrong!!";
                header("Location: product.php");
                exit(0);
            }

        }

        // DELETE products

        if(isset($_POST['delete_product'])){
            $product_id = $_POST['delete_product'];

            $query = "DELETE FROM products WHERE product_id ='$product_id' ";
            $query_run = mysqli_query($conn, $query);

            if($query_run) {
                
                $_SESSION['message'] = "Product deleted successfully";
                header("Location: product.php");
                exit(0); 

            }else{
                $_SESSION['message'] = "Something went wrong!!";
                header("Location: product.php");
                exit(0);
            }
        }
?>