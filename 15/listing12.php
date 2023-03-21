<?php
if (isset($_GET['id'])):

   require_once('dbconnection.php');

   $id = $_GET['id'];

   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
           or trigger_error('Error connecting to MySQL server for ' . DB_NAME, E_USER_ERROR);

   $query = "SELECT * FROM movieListing WHERE id = $id";

   $result = mysqli_query($dbc, $query)
              or trigger_error('Error querying database movieListing', E_USER_ERROR);
else:
?>