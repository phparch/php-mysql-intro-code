    </div>
  </div> 
  <?php if (isset($_SESSION['user_access_privileges']) 
            && $_SESSION['user_access_privileges'] == 'user'): ?>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="nav navbar-nav ml-auto">
      <a class="nav-item nav-link<?= $page_title == MR_SHOPPING_CART_MOVIE_PAGE ? ' active' : '' ?>" 
         href='shoppingcart.php'><i class='fas fa-shopping-cart'></i> 
          <span class="badge badge-light">
              <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : '' ?>
          </span>
      </a>
    </div>
  </div> 
  <?php endif; ?>
</nav>