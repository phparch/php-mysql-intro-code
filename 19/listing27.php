if (isset($_GET['id_to_edit']))
{                
   // ...
   if (mysqli_num_rows($result) == 1)
   {
       // ...
       $movie_genre_text = $row['genre'];
       $movie_image_file = $row['image_file'];

       if (empty($movie_image_file))
       {
           $movie_image_file_displayed = ML_UPLOAD_PATH . ML_DEFAULT_MOVIE_FILE_NAME;
       }
       else
       {
           $movie_image_file_displayed = $movie_image_file;
       }

       $checked_movie_genres = explode(', ', $movie_genre_text);
   }             
}