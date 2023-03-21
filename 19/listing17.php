$movie_image_file_path = addMovieImageFileReturnPathLocation();

$query = "INSERT INTO movieListing (title, rating, director, running_time_in_minutes, genre, image_file) "
        . "VALUES ('$movie_title', '$movie_rating', '$movie_director', "
        . "'$movie_runtime', '$movie_genre_text', '$movie_image_file_path')";

mysqli_query($dbc, $query)
        or trigger_error(
           'Error querying database movieListing: Failed to insert movie listing',
           E_USER_ERROR
        );