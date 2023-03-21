<?php
   // ...

   // IF NOT admininstrative access redirect to unauthorizedaccess.php script
   if ($_SESSION['user_access_privileges'] != 'admin')
   {
      header("Location: unauthorizedaccess.php");
      exit();
   }