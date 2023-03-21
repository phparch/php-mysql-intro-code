<?php
if (isset($_POST['add_movie_submission'], $_POST['movie_title'],
          $_POST['movie_rating'], $_POST['movie_director'],
          $_POST['movie_running_time_in_minutes']))
{
  require_once('dbconnection.php');

  $movie_title = $_POST['movie_title'];
  $movie_rating = $_POST['movie_rating'];
  $movie_director = $_POST['movie_director'];
  $movie_runtime = $_POST['movie_running_time_in_minutes'];
  $checked_movie_genres = $_POST['movie_genre_checkbox'];

  $movie_genre_text = "";
  if (isset($checked_movie_genres))
  {
      $movie_genre_text = implode(",", $checked_movie_genres);
  }

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
         or trigger_error(
     'Error connecting to MySQL server for ' . DB_NAME, 
      E_USER_ERROR
        );

  $query = "INSERT INTO movieListing (title, rating, director, 
                                      running_time_in_minutes, genre) "
         . "VALUES ('$movie_title', '$movie_rating', '$movie_director', 
                    '$movie_runtime', '$movie_genre_text')";

  mysqli_query($dbc, $query)
      or trigger_error(
              'Error querying database movieListing: Failed to insert movie listing', 
              E_USER_ERROR
         );
  
  // 
