$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
          or trigger_error(
             'Error connecting to MySQL server for' . DB_NAME, 
             E_USER_ERROR  
          );

if (isset($_GET['id_to_edit']))
{
    // ...
}
elseif (isset($_POST['edit_movie_submission'], $_POST['movie_title'],
        $_POST['movie_rating'], $_POST['movie_director'],
        $_POST['movie_running_time_in_minutes']))
{
    // ...
}
else  // Unintended page link
{
    // ...
}