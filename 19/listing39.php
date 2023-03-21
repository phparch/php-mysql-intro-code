if (isset($_POST['delete_movie_submission']) && isset($_POST['id'])):

   $id = $_POST['id'];

   // Query image file from DB
   $query = "SELECT image_file FROM movieListing WHERE id = $id";

   $result = mysqli_query($dbc, $query)
           or trigger_error(
              'Error querying database movieListing', E_USER_ERROR
           );

   if (mysqli_num_rows($result) == 1)
   {
       $row = mysqli_fetch_assoc($result);

       $movie_image_file = $row['image_file'];

       if (!empty($movie_image_file))
       {
           removeMovieImageFile($movie_image_file);
       }
   }

   $query = "DELETE FROM movieListing WHERE id = $id";

   $result = mysqli_query($dbc, $query)
           or trigger_error(
                 'Error querying database movieListing', E_USER_ERROR
           );

   header("Location: index.php");
   exit;
