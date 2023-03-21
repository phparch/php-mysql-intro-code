<h1>Movies I Like</h1>

<?php
require_once('dbconnection.php');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
   or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);