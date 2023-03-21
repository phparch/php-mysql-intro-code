$result = mysqli_query($dbc, $query)
        or trigger_error('Error querying database movieListing', E_USER_ERROR);

    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        $movie_title = $row['title'];
        $movie_rating = $row['rating'];
        $movie_director = $row['director'];
        $movie_runtime = $row['running_time_in_minutes'];
        $movie_genre_text = $row['genre'];

        $checked_movie_genres = explode(', ', $movie_genre_text);
    }
