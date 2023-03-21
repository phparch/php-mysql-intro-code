elseif (isset($_POST['id_to_check_in'])):

   $movie_to_check_in = $_GET['id_to_check_in'];

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
           or trigger_error(
               'Error connecting to MySQL server for' . DB_NAME, 
               E_USER_ERROR
           );

   $user_id = $_SESSION['user_id'];

   $query = "DELETE FROM reservation WHERE user_id = ? AND movieListing_id = ?";

   parameterizedQuery($dbc, $query, 'ii', $user_id, $movie_to_check_in);
   
   if (mysqli_errno($dbc))
   {
      trigger_error('Error querying database movieListing', E_USER_ERROR);
   }

   $query = "UPDATE movieListing SET number_reserved = number_reserved - 1 
             WHERE id = ?";

   parameterizedQuery($dbc, $query, 'i', $movie_to_check_in);

   if (mysqli_errno($dbc))
   {
      trigger_error('Error querying database movieListing', E_USER_ERROR);
   }

   header("Location: " . $_SERVER['PHP_SELF']);
   exit;

elseif (isset($_POST['check_in_movies'])):
