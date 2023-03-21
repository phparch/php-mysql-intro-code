if (!empty($user_name) && !empty($password))
{
   // ...
   $results = parameterizedQuery($dbc, $query, 's', $user_name)
           or trigger_error(mysqli_error($dbc), E_USER_ERROR);

   // IF user does not exist, create an account for them
   if (mysqli_num_rows($results) == 0)
   {
   }
   else // An account already exists for this user
   {
      echo "<h4><p class='text-danger'>An account already exists 
      for this username:<span class='font-weight-bold'> ($user_name)</span>. 
      Please use a different user name.</p></h4><hr/>";
   }
}