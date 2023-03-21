<h1>Login to Movie Reservations Account</h1>
<hr/>
  <?php
    if (empty($_SESSION['user_id'])):
  ?>
<form>
  <!- ... -->
</form>
  <?php
    elseif (isset($_SESSION['user_name'])):
        echo "<h4><p class='text-success'>You are logged in as: 
              <strong>{$_SESSION['user_name']}</strong>.</p></h4>";
    endif;
  ?>