$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
          or trigger_error(
             'Error connecting to MySQL server for' .  DB_NAME, E_USER_ERROR
          );

if (isset($_POST['delete_movie_submission']) && isset($_POST['id'])):
    ...
elseif (isset($_POST['do_not_delete_movie_submission'])):
    ...
elseif (isset($_GET['id_to_delete'])):
    ...
else: // Unintended page link
    ...
endif;