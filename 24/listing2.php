<nav ...>
  <!-- ... -->
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link<?= $page_title == MR_HOME_PAGE ? ' active' : '' ?>" 
         href=<?= dirname($_SERVER['PHP_SELF']) ?>>Home </a>
    </div>
  </div>
</nav>