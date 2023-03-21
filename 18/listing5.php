if (isset($_GET['id_to_edit']))
{

    $id_to_edit = $_GET['id_to_edit'];

    $query = "SELECT * FROM movieListing WHERE id = $id_to_edit";

    $result = mysqli_query($dbc, $query)
            or trigger_error('Error querying database movieListing', E_USER_ERROR);
    // ...
}
