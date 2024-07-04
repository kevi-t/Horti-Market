<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">TRANSACTIONS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM transaction";
                $query_run = mysqli_query($conn, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Buyer Id </th>
                            <th>Product Id </th>        
                            <th>Buyer name </th>
                            <th>City </th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                           
                           
                         
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
                                <td><?php  echo $row['tid']; ?></td>
                                <td><?php  echo $row['bid']; ?></td>
                                <td><?php  echo $row['pid']; ?></td>
                                <td><?php  echo $row['name']; ?></td>
                                <td><?php  echo $row['city']; ?></td>
                                <td><?php  echo $row['mobile']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['addr']; ?></td>
                                                 
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