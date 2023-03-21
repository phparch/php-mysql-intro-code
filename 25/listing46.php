    else:

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
               or trigger_error(
                  'Error connecting to MySQL server for' . DB_NAME, 
                   E_USER_ERROR
               );

        $user_id = $_SESSION['user_id'];

        $query = "SELECT movieListing.id, movieListing.title, movieListing.image_file 
                  FROM movieListing 
                     INNER JOIN reservation ON movieListing.id = reservation.movieListing_id 
                  WHERE reservation.user_id = ?";

        $result = parameterizedQuery($dbc, $query, 'i', $user_id)
                or trigger_error(
            'Error querying database tables movieListing and reservation',
            E_USER_ERROR);

        if (mysqli_num_rows($result) > 0):
    ?>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col"><h4>Movies You Have Reserved</h4></th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
                // Only display what's NOT in the shopping cart
                if (empty($_SESSION['cart']) 
                    || array_search($row['id'], $_SESSION['cart']) === false)
                {
                    $movie_image_file = $row['image_file'];

                    if (empty($movie_image_file))
                    {
                        $movie_image_file = ML_UPLOAD_PATH . ML_DEFAULT_MOVIE_FILE_NAME;
                    }

                    $movie_title_row = "<tr><td><img src=" . $movie_image_file 
                          . " class='img-thumbnail' style='max-height: 75px;'"
                          . " alt='Movie image'></td>" 
                          . "<td class='align-middle'><a class='nav-link' "
                          . " href='moviedetails.php?id=" 
                          . $row['id'] . "'>" . $row['title'] ."</a></td>";

                    $movie_title_row .= "<td class='align-middle'><form method='POST' " 
                          . "action=" . $_SERVER['PHP_SELF'] . ">"
                          . "<button class='btn btn-success' type='submit' " 
                          . "name='id_to_check_in' value='" . $row['id'] . "'>" 
                          . "<i class='fas fa-check-circle'></i></button></form></td>";

                    $movie_title_row .= "</tr>";

                    echo $movie_title_row;
                }
            }
        ?>
      </tbody>
    </table>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
      <button class="btn btn-success" type="submit" 
              name="check_in_movies">Return Movies</button>
    </form>
    <?php
        else:
    ?>
    <h3>No Movies Reserved :-(</h3>
<?php
        endif;
    endif;