if (!empty($user_name) && !empty($password))
{
   //...

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
          or trigger_error(
                'Error connecting to MySQL server for' . DB_NAME, E_USER_ERROR
          );

   // Check if user already exists
   $query = "SELECT id, user_name, password_hash, access_privileges 
             FROM user WHERE user_name = ?";

   $results = parameterizedQuery($dbc, $query, 's', $user_name)
           or trigger_error(mysqli_error($dbc), E_USER_ERROR);
}