if (!empty($user_name) && !empty($password))
{
   require_once('dbconnection.php');
   require_once('queryutils.php');

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
          or trigger_error(
              'Error connecting to MySQL server for' . DB_NAME, 
              E_USER_ERROR
   );
}