elseif (isset($_POST['check_in_movies'])):

   // Remove all reservations and update number of reserved copies 
   // in movieListing for returned movies
   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
          or trigger_error(
             'Error connecting to MySQL server for' . DB_NAME, 
              E_USER_ERROR
          );

   $user_id = $_SESSION['user_id'];

   $query = "SELECT movieListing_id FROM reservation WHERE user_id = ?";

   $result = parameterizedQuery($dbc, $query, 'i', $user_id)
           or trigger_error('Error querying database table reservation', E_USER_ERROR);

   // Decrement number of reserved in movieListing
   while ($row = mysqli_fetch_assoc($result))
   {
      $movie_to_check_in = $row['movieListing_id'];

      $query = "UPDATE movieListing 
                SET number_reserved = number_reserved - 1 WHERE id = ?";

      parameterizedQuery($dbc, $query, 'i', $movie_to_check_in);

      if (mysqli_errno($dbc))
      {
         trigger_error('Error querying database table movieListing', E_USER_ERROR);
      }
   }

   // Delete all reservations for this user
   $query = "DELETE FROM reservation WHERE user_id = ?";

   parameterizedQuery($dbc, $query, 'i', $user_id);

   if (mysqli_errno($dbc))
   {
      trigger_error('Error querying database table reservation', E_USER_ERROR);
   }

   header("Location: " . dirname($_SERVER['PHP_SELF']));
   exit;

else: