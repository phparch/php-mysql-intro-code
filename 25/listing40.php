elseif (isset($_POST['id_to_delete'])):

   $movie_to_delete = $_POST['id_to_delete'];

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or trigger_error(
               'Error connecting to MySQL server for' . DB_NAME,
               E_USER_ERROR
            );

   $user_id = $_SESSION['user_id'];

   $query = "DELETE FROM reservation 
             WHERE user_id = ? AND movieListing_id = ?";
   $result = parameterizedQuery($dbc, $query, 'ii', $user_id, $movie_to_delete);

   if (mysqli_errno($dbc))
   {
      trigger_error('Error querying database movieListing', E_USER_ERROR);
   }

   $query = "UPDATE movieListing SET number_reserved = number_reserved - 1 
             WHERE id = ?";
   $result = parameterizedQuery($dbc, $query, 'i', $movie_to_delete);

   if (mysqli_errno($dbc))
   {
      trigger_error('Error querying database movieListing', E_USER_ERROR);
   }

   if (($key = array_search($movie_to_delete, $_SESSION['cart'])) !== false)
   {
      unset($_SESSION['cart'][$key]);
   }

   header("Location: " . $_SERVER['PHP_SELF']);
   exit;

elseif (isset($_POST['reserve_movies'])):