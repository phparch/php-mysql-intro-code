else // Both first name AND last name are filled in, form entry is validated
{
    // Insert full name into database
    $dbc = mysqli_connect('localhost', 'testuser', 'testuser', 'FullName')
            or trigger_error("Error connecting to MySQL server.", E_USER_ERROR);

    $query = "INSERT INTO fullName (first_name, last_name) "
           . "VALUES ('$first_name', '$last_name')";

    $result = mysqli_query($dbc, $query)
            or trigger_error('Error querying database.', E_USER_ERROR);

    if (!$result)
    {
        echo("Query Error description: " . mysqli_error($dbc));
    }

    mysqli_close($dbc);

    echo "<br/><br/>Hello $first_name $last_name Thanks for submitting your full name!";

    $output_form = false;
}
...