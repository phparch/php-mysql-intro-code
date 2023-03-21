elseif (isset($_POST['edit_movie_submission'], $_POST['movie_title'],
        $_POST['movie_rating'], $_POST['movie_director'],
        $_POST['movie_running_time_in_minutes'], $_POST['id_to_update']))
{

    $movie_title = $_POST['movie_title'];
    $movie_rating = $_POST['movie_rating'];
    $movie_director = $_POST['movie_director'];
    $movie_runtime = $_POST['movie_running_time_in_minutes'];
    $checked_movie_genres = $_POST['movie_genre_checkbox'];
    $id_to_update = $_POST['id_to_update'];