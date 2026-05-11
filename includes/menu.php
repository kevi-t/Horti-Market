<?php
    if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1) {
        $loginProfile = $_SESSION['Username'];
        $logo = "glyphicon glyphicon-user";
        $profileLink = ($_SESSION['Category'] != 1) ? "profiles/profile.php" : "profileView.php";
    } else {
        $loginProfile = "Login";
        $profileLink = "index.php";
        $logo = "glyphicon glyphicon-log-in";
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
      <a class="navbar-brand" href="index.php">Horti-Market</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="myCart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a></li>
        <li><a href="market.php"><span class="glyphicon glyphicon-list-alt"></span> Market</a></li>
        <li><a href="blogView.php"><span class="glyphicon glyphicon-comment"></span> Blog</a></li>
      </ul>

      <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
      <form class="navbar-form navbar-left" method="GET" action="market.php">
        <div class="input-group" style="width:220px;">
          <input type="text" class="form-control" name="search" placeholder="Search products…" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
          </span>
        </div>
      </form>
      <?php endif; ?>

      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span> <?= htmlspecialchars($loginProfile) ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?= $profileLink ?>"><span class="glyphicon glyphicon-user"></span> My Profile</a></li>
              <li class="divider"></li>
              <li><a href="authenticate/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li><a href="loginpage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <li><a href="signuppage.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
</header>
