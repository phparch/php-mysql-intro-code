if (empty($_SESSION['user_id']) && isset($_POST['login_submission']))
{
   // Get user name and password
   $user_name = $_POST['user_name'];
   $password = $_POST['password'];
   
   if (!empty($user_name) && !empty($password))
   {
   }
   else
   {
      // Output error message
      echo "<h4><p class='text-danger'>You must enter both a user name
            and password.</p></h4><hr/>";
   }
}