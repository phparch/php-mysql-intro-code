<!DOCTYPE html>
<?php
  require_once('pagetitles.php');
  $page_title = MR_RESERVED_MOVIES_PAGE;
?>
<html>
  <head>
    <title><?= $page_title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
  <?php
    require_once('navmenu.php');
  ?>
    <div class="card">
      <div class="card-body">
        <h1>Reserved Movies</h1>
        <?php
            require_once('dbconnection.php');
            require_once('movielistingfileconstants.php');
            require_once('queryutils.php');

            // Only display this page if the user is logged in
            if (!isset($_SESSION['user_id'])) :

                header("Location: " . dirname($_SERVER['PHP_SELF']));

            elseif (isset($_POST['id_to_check_in'])):

                $movie_to_check_in = $_POST['id_to_check_in'];

                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

                $user_id = $_SESSION['user_id'];

                $query = "DELETE FROM reservation WHERE user_id = ? AND movieListing_id = ?";

                parameterizedQuery($dbc, $query, 'ii', $user_id, $movie_to_check_in);
                
                if(mysqli_errno($dbc))
                {
                    trigger_error('Error querying database movieListing', E_USER_ERROR);
                }

                $query = "UPDATE movieListing SET number_reserved = number_reserved - 1 WHERE id = ?";

                parameterizedQuery($dbc, $query, 'i', $movie_to_check_in);

                if(mysqli_errno($dbc))
                {
                    trigger_error('Error querying database movieListing', E_USER_ERROR);
                }

                header("Location: " . $_SERVER['PHP_SELF']);

            elseif (isset($_POST['check_in_movies'])):

                // Remove all reservations and update number of reserved copies in movieListing for returned movies
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

                $user_id = $_SESSION['user_id'];

                $query = "SELECT movieListing_id FROM reservation WHERE user_id = ?";

                $result = parameterizedQuery($dbc, $query, 'i', $user_id)
                        or trigger_error('Error querying database table reservation', E_USER_ERROR);

                // Decrement number of reserved in movieListing
                while($row = mysqli_fetch_assoc($result))
                {
                    $movie_to_check_in = $row['movieListing_id'];

                    $query = "UPDATE movieListing SET number_reserved = number_reserved - 1 WHERE id = ?";

                    parameterizedQuery($dbc, $query, 'i', $movie_to_check_in);

                    if(mysqli_errno($dbc))
                    {
                        trigger_error('Error querying database table movieListing', E_USER_ERROR);
                    }
                }

                // Delete all reservations for this user
                $query = "DELETE FROM reservation WHERE user_id = ?";

                parameterizedQuery($dbc, $query, 'i', $user_id);

                if(mysqli_errno($dbc))
                {
                    trigger_error('Error querying database table reservation', E_USER_ERROR);
                }

                header("Location: " . dirname($_SERVER['PHP_SELF']));

            else:

                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

                $user_id = $_SESSION['user_id'];

                $query = "SELECT movieListing.id, movieListing.title, movieListing.image_file FROM movieListing INNER JOIN reservation ON movieListing.id = reservation.movieListing_id WHERE reservation.user_id = ?";

                $result = parameterizedQuery($dbc, $query, 'i', $user_id)
                        or trigger_error('Error querying database tables movieListing and reservation', E_USER_ERROR);

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
                        if (empty($_SESSION['cart']) || array_search($row['id'], $_SESSION['cart']) === false)
                        {
                            $movie_image_file = $row['image_file'];

                            if (empty($movie_image_file))
                            {
                                $movie_image_file = ML_UPLOAD_PATH . ML_DEFAULT_MOVIE_FILE_NAME;
                            }

                            $movie_title_row = "<tr><td><img src=" . $movie_image_file . " class='img-thumbnail'" .
                                    "style='max-height: 75px;' alt='Movie image'></td>" .
                                    "<td class='align-middle'><a class='nav-link' href='moviedetails.php?id=" .
                                    $row['id'] . "'>" . $row['title'] ."</a></td>";

                            $movie_title_row .= "<td class='align-middle'><form method='POST' action=" . 
                                    $_SERVER['PHP_SELF'] . "><button class='btn btn-success' type='submit' " . 
                                    "name='id_to_check_in' value='" . $row['id'] . "'>" .
                                    "<i class='fas fa-check-circle'></i></button></form></td>";

                            $movie_title_row .= "</tr>";

                            echo $movie_title_row;
                        }
                    }
                ?>
              </tbody>
            </table>
            <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
              <button class="btn btn-success" type="submit" name="check_in_movies">Return Movies</button>
            </form>
            <?php
                else:
            ?>
            <h3>No Movies Reserved :-(</h3>
        <?php
                endif;
            endif;
        ?>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>