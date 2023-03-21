elseif (isset($_COOKIE['name']) && isset($_COOKIE['favorite_cookie']))
{
?>
<h4>
  Hey <?= htmlspecialchars($_COOKIE['name']) ?>, you like 
  <?= htmlspecialchars($_COOKIE['favorite_cookie']) ?> cookies. Very nice!
</h4>
<?php
    setcookie('name', '', time() - 3600);
    setcookie('favorite_cookie', '', time() - 3600);
}