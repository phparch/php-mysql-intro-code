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

    $movie_genre_text = "";

    if (isset($checked_movie_genres))
    {
        $movie_genre_text = implode(", ", $checked_movie_genres);
    }

    $query = "UPDATE movieListing SET title = '$movie_title', rating = '$movie_rating', "
           . "director = '$movie_director', running_time_in_minutes = '$movie_runtime', "
           . "genre = '$movie_genre_text' "
           . "WHERE id = $id_to_update";

    mysqli_query($dbc, $query)
        or trigger_error(
            'Error querying database movieListing: Failed to update movie listing', 
            E_USER_ERROR
        );

    $nav_link = 'moviedetails.php?id=' . $id_to_update;

    header("Location: $nav_link");
    exit;
}