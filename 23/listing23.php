if (!empty($user_name) && !empty($password))
{
   // ...

   $results = parameterizedQuery($dbc, $query, 's', $user_name)
              or trigger_error(mysqli_error($dbc), E_USER_ERROR);

   // IF user was found, validate password
   if (mysqli_num_rows($results) == 1)
   {
   }
   else if(mysqli_num_rows($results) == 0) // User does not exist
   {
      echo "<h4><p class='text-danger'>An account does not exist for this username:"
           . "<span class='font-weight-bold'> ($user_name)</span>. "
           . "Please use a different user name.</p></h4><hr/>";
   }
   else
   {
      echo "<h4><p class='text-danger'>Something went terribly wrong!</p></h4><hr/>";
   }
}