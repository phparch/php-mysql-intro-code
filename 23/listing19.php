<h1>Login to Movie Reservations Account</h1>
<hr/>
  <?php
    if (empty($_SESSION['user_id']) && isset($_POST['login_submission']))
    {
    }

    if (empty($_SESSION['user_id'])):
  ?>
<form ...>