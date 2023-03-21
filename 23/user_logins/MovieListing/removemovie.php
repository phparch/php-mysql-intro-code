<?php
  require_once('authorizeaccess.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Remove a Movie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <div class="card">
      <div class="card-body">
        <h1>Remove a Movie</h1>
        <?php
            require_once('dbconnection.php');
            require_once('movieimagefileutil.php');
            require_once('queryutils.php');

            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

            if (isset($_POST['delete_movie_submission']) && isset($_POST['id'])):

                $id = $_POST['id'];

                // Query image file from DB
                $query = "SELECT image_file FROM movieListing WHERE id = ?";

                $result = parameterizedQuery($dbc, $query, 'i', $id)
                        or trigger_error('Error querying database movieListing', E_USER_ERROR);

                if (mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_assoc($result);

                    $movie_image_file = $row['image_file'];

                    if (!empty($movie_image_file))
                    {
                        removeMovieImageFile($movie_image_file);
                    }
                }
                
                $query = "DELETE FROM movieListing WHERE id = ?";

                $result = parameterizedQuery($dbc, $query, 'i', $id)
                        or trigger_error('Error querying database movieListing', E_USER_ERROR);

                header("Location: index.php");

            elseif (isset($_POST['do_not_delete_movie_submission'])):

                header("Location: index.php");

            elseif (isset($_GET['id_to_delete'])):
        ?>
                <h3 class="text-danger">Confirm Deletion of the Following Movie Details:</h3><br/>
        <?php
                $id = $_GET['id_to_delete'];

                $query = "SELECT * FROM movieListing WHERE id = ?";

                $result = parameterizedQuery($dbc, $query, 'i', $id)
                        or trigger_error('Error querying database movieListing', E_USER_ERROR);

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
              <div class="form-group row">
                <div class="col-sm-2">
                  <button class="btn btn-danger" type="submit" name="delete_movie_submission">Delete Movie</button>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-success" type="submit" name="do_not_delete_movie_submission">Don't Delete</button>
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
              </div>
            </form>
            <?php
                }
                else
                {
                ?>
            <h3>No Movie Details :-(</h3>
                <?php
                }

            else: // Unintended page link -  No movie to remove, link back to index

                header("Location: index.php");

            endif;
        ?>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>