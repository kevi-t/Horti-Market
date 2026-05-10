<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Horticulture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/footer.css" />
  <link rel="stylesheet" href="assets/css/menu.css" />
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>

<?php require 'includes/menu.php';?>

<body>
<div class="bg-img">
 <center>
<form action="authenticate/signUp.php" method='POST' class="container">
    <h2>SIGNUP</h2>
    <div class="form-group">
        <input class="form-control" type="text" name="name" id="name" value="" placeholder="Name" required/>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="uname" id="uname" value="" placeholder="Surname" required/>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required/>
    </div>
    <div class="form-group">
        <input class="form-control" type="email" name="email" id="email" value="" placeholder="Email" required style="width:80%">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="pass" id="pass" value="" placeholder="Password" required>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="addr" id="addr" value="" placeholder="Address" required/>
    </div>

    <div class="form-group" style="margin:12px 0;">
        <label style="color:#fff;font-weight:bold;display:block;margin-bottom:8px;">Register as:</label>
        <div style="display:flex;gap:12px;justify-content:center;">
            <label class="category-card" for="farmer">
                <input type="radio" id="farmer" name="category" value="1" checked hidden>
                <span class="glyphicon glyphicon-leaf" style="font-size:24px;display:block;margin-bottom:4px;"></span>
                Farmer
            </label>
            <label class="category-card" for="buyer">
                <input type="radio" id="buyer" name="category" value="0" hidden>
                <span class="glyphicon glyphicon-shopping-cart" style="font-size:24px;display:block;margin-bottom:4px;"></span>
                Buyer
            </label>
        </div>
    </div>

    <button type="submit" class="btn" name="submit">Register</button>
</form>
</center>
</div>

</body>
<?php require 'includes/footer.php';?>

<style>
.category-card {
    cursor: pointer;
    background: rgba(255,255,255,0.15);
    border: 2px solid transparent;
    border-radius: 10px;
    padding: 14px 28px;
    color: #fff;
    font-weight: bold;
    text-align: center;
    transition: all 0.2s ease;
    user-select: none;
}
.category-card:hover {
    background: rgba(255,255,255,0.25);
}
input[type="radio"]:checked + span {
    color: #04AA6D;
}
#farmer:checked ~ label[for="farmer"],
label[for="farmer"]:has(input:checked),
#farmer:checked + label { border-color: #04AA6D; background: rgba(4,170,109,0.2); }
#buyer:checked + label  { border-color: #04AA6D; background: rgba(4,170,109,0.2); }
</style>

<script>
document.querySelectorAll('.category-card').forEach(function(card) {
    card.addEventListener('click', function() {
        document.querySelectorAll('.category-card').forEach(function(c) {
            c.style.borderColor = 'transparent';
            c.style.background  = 'rgba(255,255,255,0.15)';
        });
        this.style.borderColor = '#04AA6D';
        this.style.background  = 'rgba(4,170,109,0.2)';
    });
});
// Set initial selected state
document.querySelector('label[for="farmer"]').style.borderColor = '#04AA6D';
document.querySelector('label[for="farmer"]').style.background  = 'rgba(4,170,109,0.2)';
</script>

</html>
