<?php 
    include('./authentication.php');
    include('includes/header.php');
?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Payment</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Payment</li>
                <li class="breadcrumb-item">Select staff</li>
            </ol>
            <?php require('../message.php'); ?>
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <?php require('../message.php'); ?>

                            <div class="card-header">
                                <h3>Select Staff</h3>
                            </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if(isset($_POST['submit'])){
                                    $id = $_POST['id'];
                                    $date = $_POST['date'];
                                }

                            ?>
                            <form action="test1.php" method="POST">
                            <?php 
                                $query ="SELECT * FROM staffs";
                                $result = mysqli_query($conn, $query);
                                if(mysqli_num_rows($result) > 0){
                                ?>
                                    <select name="id" class="form-control">
                                        <option>Select staffs</option>
                                        <?php 
                                        foreach($result as $row){
                                        ?>
                                            <option value="<?php echo $row['staff_id']; ?>"><?php echo $row['firstname'] . $row['surname']; ?> </option>
                                            <?php 
                                            }
                                        ?>
                                    </select>
                                <?php
                                }
                            ?>
                            <input type="date" name="date" class="form-control">
                            
                            <input type="submit" class="btn btn-success" value="Go next">
                            </form>
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