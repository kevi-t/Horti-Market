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
  <title>Horticulture — Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/footer.css" />
  <link rel="stylesheet" href="assets/css/menu.css" />
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
<?php require 'includes/menu.php'; ?>

<div class="bg-img">
  <form action="authenticate/signUp.php" method="POST" class="auth-card">

    <h2>Create Account</h2>
    <p class="auth-subtitle">Already have an account? <a href="loginpage.php">Sign in</a></p>

    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['message']); unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <div class="form-group">
      <label for="name">Full Name</label>
      <input class="form-control" type="text" name="name" id="name" placeholder="John Doe" required/>
    </div>
    <div class="form-group">
      <label for="uname">Surname</label>
      <input class="form-control" type="text" name="uname" id="uname" placeholder="Doe" required/>
    </div>
    <div class="form-group">
      <label for="mobile">Mobile Number</label>
      <input class="form-control" type="text" name="mobile" id="mobile" placeholder="0712 345 678" required/>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" type="email" name="email" id="email" placeholder="you@example.com" required>
    </div>
    <div class="form-group">
      <label for="pass">Password</label>
      <input class="form-control" type="password" name="pass" id="pass" placeholder="Minimum 8 characters" required>
    </div>
    <div class="form-group">
      <label for="addr">Address</label>
      <input class="form-control" type="text" name="addr" id="addr" placeholder="Your address" required/>
    </div>

    <div class="form-group" style="margin:16px 0 20px;">
      <label style="display:block;margin-bottom:10px;">Register as:</label>
      <div style="display:flex;gap:12px;justify-content:center;">
        <label class="category-card selected" id="card-farmer" for="farmer">
          <input type="radio" id="farmer" name="category" value="1" checked hidden>
          <span class="glyphicon glyphicon-leaf" style="font-size:22px;display:block;margin-bottom:4px;"></span>
          Farmer
        </label>
        <label class="category-card" id="card-buyer" for="buyer">
          <input type="radio" id="buyer" name="category" value="0" hidden>
          <span class="glyphicon glyphicon-shopping-cart" style="font-size:22px;display:block;margin-bottom:4px;"></span>
          Buyer
        </label>
      </div>
    </div>

    <button type="submit" name="submit" class="btn-submit">Create Account</button>

  </form>
</div>
</body>

<?php require 'includes/footer.php'; ?>

<script>
document.querySelectorAll('.category-card').forEach(function(card) {
  card.addEventListener('click', function() {
    document.querySelectorAll('.category-card').forEach(function(c) {
      c.classList.remove('selected');
    });
    this.classList.add('selected');
  });
});
</script>

</html>
