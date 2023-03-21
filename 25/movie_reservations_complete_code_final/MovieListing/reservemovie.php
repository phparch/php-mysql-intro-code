<!DOCTYPE html>
<?php
  require_once('pagetitles.php');
  $page_title = MR_RESERVE_MOVIE_PAGE;
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
        <h1>Reserve Movie</h1>
        <?php
            require_once('dbconnection.php');
            require_once('movieimagefileutil.php');

            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

            if (isset($_POST['add_to_cart']) && isset($_POST['id'])):

                $movie_id = $_POST['id'];

                // Query if movie is still reservable
                $query = "SELECT id FROM movieListing WHERE id = ? AND number_of_copies - number_reserved > 0";

                $result = parameterizedQuery($dbc, $query, 'i', $movie_id);

                if(mysqli_errno($dbc))
                {
                    trigger_error('Error querying database movieListing', E_USER_ERROR);
                }

                // Reserve movie if it's reservable,
                // update the number of reserved copies in movieListing for reserved movies,
                // and add it to the cart
                if (mysqli_num_rows($result) == 1 && isset($_SESSION['user_id']))
                {
                    $user_id = $_SESSION['user_id'];
                    
                    $query = "INSERT INTO reservation (user_id, movieListing_id) VALUES (?, ?)";

                    $result = parameterizedQuery($dbc, $query, 'ii', $user_id, $movie_id);

                    if(mysqli_errno($dbc))
                    {
                        trigger_error('Error querying database movieListing.reservation', E_USER_ERROR);
                    }
                    
                    $query = "UPDATE movieListing SET number_reserved = number_reserved + 1 WHERE id = ?";

                    $result = parameterizedQuery($dbc, $query, 'i', $movie_id);

                    if(mysqli_errno($dbc))
                    {
                        trigger_error('Error querying database movieListing.reservation', E_USER_ERROR);
                    }
                            
                    if (isset($_SESSION['cart']))
                    {
                        array_push($_SESSION['cart'], $movie_id);
                    }
                    else
                    {
                        $_SESSION['cart'] = [$movie_id];
                    }
                }

                header("Location: " . dirname($_SERVER['PHP_SELF']));
                
            elseif (isset($_GET['id_to_reserve'])):
        ?>
                <h3 class="text-success">Confirm Reservation of the Following Movie:</h3><br/>
        <?php
                $id = $_GET['id_to_reserve'];

                $query = "SELECT * FROM movieListing WHERE id = ?";

                $result = parameterizedQuery($dbc, $query, 'i', $id);

                if(mysqli_errno($dbc))
                {
                    trigger_error('Error querying database movieListing', E_USER_ERROR);
                }

                if (mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_assoc($result);

                    $movie_image_file = $row['image_file'];

                    if (empty($movie_image_file))
                    {
                        $movie_image_file = ML_UPLOAD_PATH . ML_DEFAULT_MOVIE_FILE_NAME;
                    }
            ?>
            <h1><?=$row['title']?></h1>
            <div class="row">
              <div class="col-2">
                <img src="<?=$movie_image_file?>" class="img-thumbnail" style="max-height: 200px;" alt="Movie image">
              </div>
              <div class="col">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th scope="row">Rating</th>
                      <td><?=$row['rating']?></td>
                    </tr>
                    <tr>
                      <th scope="row">Director</th>
                      <td><?=$row['director']?></td>
                    </tr>
                    <tr>
                      <th scope="row">Running Time (minutes)</th>
                      <td><?=$row['running_time_in_minutes']?></td>
                    </tr>
                    <tr>
                      <th scope="row">Genre</th>
                      <td><?=$row['genre']?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <p>
            <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
              <button class="btn btn-success" type="submit" name="add_to_cart">Add to Cart</button>
              <input type="hidden" name="id" value="<?= $id ?>">
            </form>
            <?php
                }
                else
                {
                ?>
            <h3>No Movie Details :-(</h3>
                <?php
                }

            else: // Unintended page link -  No movie to reseve, redirect back to index

                header("Location: " . dirname($_SERVER['PHP_SELF']));

            endif;
        ?>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>