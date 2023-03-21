        <h3 class="text-danger">Confirm Deletion of the Following Movie Details:</h3><br/>
<?php
      $id = $_GET['id_to_delete'];

      $query = "SELECT * FROM movieListing WHERE id = $id";

      $result = mysqli_query($dbc, $query)
                or trigger_error(
                        'Error querying database movieListing', 
                        E_USER_ERROR
                );

      if (mysqli_num_rows($result) == 1):

          $row = mysqli_fetch_assoc($result)
?>