<?php
    include('security.php');
?>

<form action="code.php" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
            <small class="error_email" style="color: red;"></small>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
        </div>

        <input type="hidden" name="usertype" value="admin">

    </div>
    <div class="modal-footer">
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
    </div>
</form>