<?php
$dbc = mysqli_connect('localhost', 'testuser', 'testuser', 'FullName')
          or trigger_error('Error connecting to MySQL server.', E_USER_ERROR);

$query = "SELECT first_name FROM fullName";

$result = mysqli_query($dbc, $query)
      or trigger_error('Error querying database.', E_USER_ERROR);

while ($row = mysqli_fetch_array($result))
{
  echo "<br/>First Name: <strong>" . $row['first_name'] . "</strong>";
}