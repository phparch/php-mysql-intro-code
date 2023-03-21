$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or trigger_error(
              'Error connecting to MySQL server for DB_NAME.', E_USER_ERROR
        );

$genres = [
   'Action', 'Adventure', 'Comedy', 'Documentary', 'Drama',
   'Fantasy', 'Horror', 'Romance', 'Science Fiction'
];

if (isset($_GET['id_to_edit']))
{
    // ...
}