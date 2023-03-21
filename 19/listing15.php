if (isset($_POST['add_movie_submission'], $_POST['movie_title'],
          $_POST['movie_rating'], $_POST['movie_director'],
          $_POST['movie_running_time_in_minutes']))
{
   // ...
   $movie_title = $_POST['movie_title'];
   $movie_rating = $_POST['movie_rating'];
   $movie_director = $_POST['movie_director'];
   $movie_runtime = $_POST['movie_running_time_in_minutes'];
   $checked_movie_genres = $_POST['movie_genre_checkbox'];

   $movie_genre_text = "";

   if (isset($checked_movie_genres))
   {
       $movie_genre_text = implode(", ", $checked_movie_genres);
   }
