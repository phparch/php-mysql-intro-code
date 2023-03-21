   $file_error_message = validateMovieImageFile();

   if (empty($file_error_message))
   {
       $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
               or trigger_error(
                     'Error connecting to MySQL server for' . DB_NAME, 
                     E_USER_ERROR
                  );

       $query = "INSERT INTO movieListing (title, rating, director, "
              . " running_time_in_minutes, genre) "
              . "VALUES ('$movie_title', '$movie_rating', '$movie_director',"
              . "'$movie_runtime', '$movie_genre_text')";

       mysqli_query($dbc, $query)
               or trigger_error(
                   'Error querying database movieListing: Failed to insert movie listing', 
                   E_USER_ERROR
               );

       $display_add_movie_form = false;
   ?>
     <h3 class="text-info">The Following Movie Details were Added:</h3><br/>

     <h1><?= $movie_title ?></h1>
     <table class="table table-striped">
       <tbody>
       <tr>
         <th scope="row">Rating</th>
         <td><?= $movie_rating ?></td>
       </tr>
       <tr>
         <th scope="row">Director</th>
         <td><?= $movie_director ?></td>
       </tr>
       <tr>
         <th scope="row">Running Time (minutes)</th>
         <td><?= $movie_runtime ?></td>
       </tr>
       <tr>
         <th scope="row">Genre</th>
         <td><?= $movie_genre_text ?></td>
       </tr>
       </tbody>
     </table>
     <hr/>
     <p>Would you like to <a href="<?= $_SERVER['PHP_SELF'] ?>"> add another movie</a>?</p>
     <?php
   }
}
