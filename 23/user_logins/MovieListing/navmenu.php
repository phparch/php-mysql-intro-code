<?php
    $page_title = isset($page_title) ? $page_title : "";

    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    require_once('queryutils.php');
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<nav class="navbar sticky-top navbar-expand-md navbar-dark" style="background-color: #569f32;">
  <a class="navbar-brand" href=<?= dirname($_SERVER['PHP_SELF']) ?>>
    <img src="resources/movie_rental_icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    <?= MR_HOME_PAGE ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link<?= $page_title == MR_HOME_PAGE ? ' active' : '' ?>" href=<?= dirname($_SERVER['PHP_SELF']) ?>>Home </a>
      <?php if (isset($_SESSION['user_access_privileges']) && $_SESSION['user_access_privileges'] == 'admin'): ?>
        <a class="nav-item nav-link<?= $page_title == MR_ADD_MOVIE_PAGE ? ' active' : '' ?>" href="addmovie.php">Add a Movie</a>
      <?php endif; ?>
      <?php if (!isset($_SESSION['user_name'])): ?>
        <a class="nav-item nav-link<?= $page_title == MR_LOGIN_PAGE ? ' active' : '' ?>" href="login.php">Login</a>
        <a class="nav-item nav-link<?= $page_title == MR_SIGNUP_PAGE ? ' active' : '' ?>" href="signup.php">Sign Up</a>
      <?php else: ?>
        <a class='nav-item nav-link' href='logout.php'>Logout (<?=$_SESSION['user_name'] ?>)</a>
      <?php endif; ?>
    </div>
  </div>
  <?php if (isset($_SESSION['user_access_privileges']) && $_SESSION['user_access_privileges'] == 'user'): ?>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="nav navbar-nav ml-auto">
      <?php if (numberOfMoviesReservedNotInCart() > 0): ?>
        <a class="nav-item nav-link<?= $page_title == MR_RESERVED_MOVIES_PAGE ? ' active' : '' ?>" href='reservedmovies.php'><i class="fas fa-video"></i></a>
      <?php endif; ?>
      <a class="nav-item nav-link<?= $page_title == MR_SHOPPING_CART_MOVIE_PAGE ? ' active' : '' ?>" href='shoppingcart.php'><i class='fas fa-shopping-cart'></i> <span class="badge badge-light"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : '' ?></span></a>
    </div>
  </div> 
  <?php endif; ?>
</nav>