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
    <h1><?= $row['title'] ?></h1>
    <div class="row">
      <div class="col-2">
        <img src="<?= $movie_image_file ?>" class="img-thumbnail"
             style="max-height: 200px;" alt="Movie image">
      </div>
      <div class="col">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">Rating</th>
              <td><?= $row['rating'] ?></td>
            </tr>
            <tr>
              <th scope="row">Director</th>
              <td><?= $row['director'] ?></td>
            </tr>
            <tr>
              <th scope="row">Running Time (minutes)</th>
              <td><?= $row['running_time_in_minutes'] ?></td>
            </tr>
            <tr>
              <th scope="row">Genre</th>
              <td><?= $row['genre'] ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <p>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
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

    else: // Unintended page link -  No movie to reserve, redirect back to index