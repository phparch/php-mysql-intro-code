<nav ...>
    <!-- ... -->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link...">Home </a>
      <?php if (isset($_SESSION['user_access_privileges'])
            && $_SESSION['user_access_privileges'] == 'admin'): ?>
        <a class=" nav-item
               nav-link<?= $page_title == MR_ADD_MOVIE_PAGE ? ' active' : '' ?>"
            href="addmovie.php">Add a Movie</a>
           <?php endif; ?>
           <?php if (!isset($_SESSION['user_name'])): ?>
               <a ...>Login</a>
               <a ...>Sign Up</a>
           <?php else: ?>
               <a class='nav-item nav-link' href='logout.php'>Logout
                   (<?= $_SESSION['user_name'] ?>)</a>
           <?php endif; ?>
            <!-- ... -->
        </div>
    </div>
</nav>