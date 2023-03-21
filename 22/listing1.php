<?php
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
          or trigger_error(
              'Error connecting to MySQL server for' . DB_NAME,
              E_USER_ERROR
          );

$search_term = isset($_POST['search']) ? $_POST['search'] : '';

$search_term = mysqli_real_escape_string($dbc, $search_term);

$query = "SELECT some_field_1, some_field_2, some_field_3 FROM SomeTable "
       . "WHERE some_field_n LIKE '%$search_term%'";

$result = mysqli_query($dbc, $query)
    or trigger_error(
        'Error querying database Products', E_USER_ERROR
    );