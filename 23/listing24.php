// IF user was found, validate password
if (mysqli_num_rows($results) == 1)
{
   $row = mysqli_fetch_array($results);

   if (password_verify($password, $row['password_hash']))
   {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_name'] = $row['user_name'];
      $_SESSION['user_access_privileges'] = $row['access_privileges'];

      // Redirect to the home page
      $home_url = dirname($_SERVER['PHP_SELF']);
      header('Location: ' . $home_url);
      exit;
   }
   else
   {
      echo "<h4><p class='text-danger'>An incorrect user name or password was entered.</p></h4><hr/>";
   }
}
else if (mysqli_num_rows($results) == 0) // User does not exist
{
    // ...
}
