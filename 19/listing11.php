if (isset($checked_movie_genres))
{
    $movie_genre_text = implode(", ", $checked_movie_genres);
}

/*
Here is where we will deal with the file by calling validateMovieImageFile().
This function will validate that the movie image file is the right image type
(jpg/png/gif), and not greater than 512KB. This function will return an empty
string ('') if the file validates successfully, otherwise, the string will
contain error text to be output to the web page before redisplaying the form.
*/