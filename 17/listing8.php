if (isset($_POST['delete_movie_submission']) && isset($_POST['id'])):

   $id = $_POST['id'];

   $query = "DELETE FROM movieListing WHERE id = $id";

   $result = mysqli_query($dbc, $query)
           or trigger_error('Error querying database movieListing', E_USER_ERROR);

   header("Location: index.php");
   exit;