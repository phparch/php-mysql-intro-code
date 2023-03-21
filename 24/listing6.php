<nav ...>
  <!-- ... -->
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link...">Home </a>
      <?php if (!isset($_SESSION['user_name'])): ?>
        <a class="nav-item nav-link<?= $page_title == MR_LOGIN_PAGE ? ' active' : '' ?>" 
           href="login.php">Login</a>
        <a class="nav-item nav-link<?= $page_title == MR_SIGNUP_PAGE ? ' active' : '' ?>" 
           href="signup.php">Sign Up</a>
      <?php else: ?>
        <a class="nav-item nav-link" 
           href="logout.php">Logout (<?=$_SESSION['user_name'] ?>)</a>
      <?php endif; ?>
    </div>
  </div>
</nav>