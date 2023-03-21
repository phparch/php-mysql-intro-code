<?php
   session_start();

   // Not logged in, redirect to unauthorizedaccess.php script
   if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_access_privileges']))
   {
       header("Location: unauthorizedaccess.php");
       exit();
   }