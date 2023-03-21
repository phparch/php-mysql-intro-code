<?php
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or trigger_error(
           'Error connecting to MySQL server for' . DB_NAME,
           E_USER_ERROR
        );

$search_term = isset($_POST['search']) ? $_POST['search'] : '';

$sql = "SELECT some_field_1, some_field_2, some_field_3 "
     . " FROM SomeTable WHERE some_field_n LIKE ?";

$stmt = mysqli_prepare($dbc, $sql);

$search_term = '%' . $search_term . '%';

mysqli_stmt_bind_param($stmt, 's', $search_term);