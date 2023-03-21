if (empty($file_error_message))
{
   $movie_image_file_path = addMovieImageFileReturnPathLocation();

   // IF new image selected, set it to be updated in the database.
   if (!empty($movie_image_file_path))
   {
      // IF replacing an image (other than the default), remove it
      if (!empty($movie_image_file))
      {
         removeMovieImageFile($movie_image_file);
      }

      $movie_image_file = $movie_image_file_path;
   }

   $query = "UPDATE movieListing SET title = '$movie_title', rating = '$movie_rating', "
          . "director = '$movie_director', running_time_in_minutes = '$movie_runtime', "
          . "genre = '$movie_genre_text', image_file = '$movie_image_file' " .
          . "WHERE id = $id_to_update";

   mysqli_query($dbc, $query)
           or trigger_error(
               'Error querying database movieListing: Failed to update movie listing', 
               E_USER_ERROR
           );

   $nav_link = 'moviedetails.php?id=' . $id_to_update;

   header("Location: $nav_link");
   exit();
}
