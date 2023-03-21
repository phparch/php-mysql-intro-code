if (isset($checked_movie_genres))
{
    $movie_genre_text = implode(", ", $checked_movie_genres);
}

if (empty($movie_image_file))
{
    $movie_image_file_displayed = ML_UPLOAD_PATH . ML_DEFAULT_MOVIE_FILE_NAME;
}
else
{
    $movie_image_file_displayed = $movie_image_file;
}