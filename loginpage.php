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
  <title>Horticulture — Login</title>
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
  <form action="authenticate/login.php" method="POST" class="auth-card">

    <h2>Login</h2>
    <p class="auth-subtitle">Welcome back. Sign in to continue.</p>

    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['message']); unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" type="email" name="email" id="email" placeholder="you@example.com" required>
    </div>
    <div class="form-group">
      <label for="pass">Password</label>
      <input class="form-control" type="password" name="pass" id="pass" placeholder="••••••••" required>
    </div>

    <button type="submit" name="submit" class="btn-submit">Login</button>

    <p class="auth-footer-text">Don't have an account? <a href="signuppage.php">Register</a></p>

  </form>
</div>
</body>

<?php require 'includes/footer.php'; ?>

</html>
