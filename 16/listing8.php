    // pro-tip: you can test multiple variables within a single isset() call
    if (isset($_POST['add_movie_submission'], $_POST['movie_title'],
              $_POST['movie_rating'], $_POST['movie_director'],
              $_POST['movie_running_time_in_minutes']))
    {
        // Code to insert new movie into database
        ...
    }
    ...
    if ($display_add_movie_form) {
?>
<form ...>