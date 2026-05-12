<?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        $loginProfile = $_SESSION['Username'];
        $profileLink  = ($_SESSION['Category'] != 1) ? '../profiles/profile.php' : '../profileView.php';
    }
?>
<header id="header">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../home.php">Horti-Market</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="../myCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a></li>
        <li><a href="../market.php"><span class="glyphicon glyphicon-list-alt"></span> Market</a></li>
        <li><a href="../blogView.php"><span class="glyphicon glyphicon-comment"></span> Blog</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span> <?= htmlspecialchars($loginProfile) ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?= $profileLink ?>"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
              <?php if (isset($_SESSION['Category']) && $_SESSION['Category'] == 1): ?>
              <li><a href="uploadProduct.php"><span class="glyphicon glyphicon-upload"></span> Upload Product</a></li>
              <?php endif; ?>
              <li class="divider"></li>
              <li><a href="../authenticate/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li><a href="../loginpage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <li><a href="../signuppage.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <?php endif; ?>
      </ul>

      <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
      <form class="navbar-form navbar-right" method="GET" action="../market.php">
        <div class="input-group" style="width:260px;">
          <input type="text" class="form-control" name="search" placeholder="Search products…" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
          <span class="input-group-btn">
            <button class="btn" type="submit" style="background-color:#04AA6D;color:white;border-color:#04AA6D;width:auto;padding:6px 10px;margin-bottom:0;border-radius:0 4px 4px 0;"><span class="glyphicon glyphicon-search"></span></button>
          </span>
        </div>
      </form>
      <?php endif; ?>
    </div>
  </div>
</nav>
</header>
<?php require __DIR__ . '/../includes/flash.php'; ?>
