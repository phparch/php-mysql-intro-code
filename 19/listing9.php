function addMovieImageFileReturnPathLocation()
{
   $movie_file_path = "";

   // Check for $_FILES being set and no errors.
   if (isset($_FILES) && $_FILES['movie_image_file']['error'] == UPLOAD_ERR_OK) {
      $movie_file_path =
         ML_UPLOAD_PATH . $_FILES['movie_image_file']['name'];

      if (!move_uploaded_file($_FILES['movie_image_file']['tmp_name'], $movie_file_path)) {
         $movie_file_path = "";
      }
   }

   return $movie_file_path;
}