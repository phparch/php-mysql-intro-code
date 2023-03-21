    elseif (isset($_SESSION['name']) && isset($_SESSION['favorite_cookie']))
    {
?>
<h4>
  Hey <?= $_SESSION['name'] ?>, you like 
  <?= $_SESSION['favorite_cookie'] ?> cookies. Very nice!
</h4>
<?php
        session_destroy();  // End the current session
        $_SESSION = []; // Destroy all session variables in the current session
    }
