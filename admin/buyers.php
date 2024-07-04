<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">BUYERS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM buyer";
                $query_run = mysqli_query($conn, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Username </th>        
                            <th>Email </th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Date</th>
                           
                         
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
                                <td><?php  echo $row['bid']; ?></td>
                                <td><?php  echo $row['busername']; ?></td>
                                <td><?php  echo $row['bemail']; ?></td>
                                <td><?php  echo $row['bmobile']; ?></td>
                                <td><?php  echo $row['baddress']; ?></td>
                                <td><?php  echo $row['regdate']; ?></td>
                               
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