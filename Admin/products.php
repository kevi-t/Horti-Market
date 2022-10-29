<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products Menu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM fproduct";
                $query_run = mysqli_query($conn, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                             
                            <th>Farmer ID </th>
                            <th>Product ID </th>
                            <th>Product </th>
                            <th>Category </th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>DELETE</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['fid']; ?></td>
                                <td><?php  echo $row['pid']; ?></td>
                                <td><?php  echo $row['product']; ?></td>
                                <td><?php  echo $row['pcat']; ?></td>
                                <td><?php  echo $row['price']; ?></td>
                                <td><?php  echo $row['dateAdded']; ?></td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['pid']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                               
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>





<?php
include('includes/scripts.php');
include('includes/footer.php');
?>