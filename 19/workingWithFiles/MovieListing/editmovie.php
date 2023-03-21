<!DOCTYPE html>
<html>
  <head>
    <title>Edit a Movie</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
          crossorigin="anonymous">
  </head>
  <body>
    <div class="card">
      <div class="card-body">
        <h1>Edit a Movie</h1>
        <nav class="nav">
          <a class="nav-link" href="index.php">Movies I Like</a>
      </nav>
      <hr/>
        <?php
            require_once('dbconnection.php');
            require_once('movieimagefileutil.php');

            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

            $genres = [
               'Action', 'Adventure', 'Comedy', 'Documentary', 'Drama',
               'Fantasy', 'Horror', 'Romance', 'Science Fiction'
            ];
          
            if (isset($_GET['id_to_edit']))
            {                
                $id_to_edit = $_GET['id_to_edit'];
            
                $query = "SELECT * FROM movieListing WHERE id = $id_to_edit";

                $result = mysqli_query($dbc, $query)
                        or trigger_error('Error querying database movieListing', E_USER_ERROR);
                
                if (mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_assoc($result);
                
                    $movie_title = $row['title'];
                    $movie_rating = $row['rating'];
                    $movie_director = $row['director'];
                    $movie_runtime = $row['running_time_in_minutes'];
                    $movie_genre_text = $row['genre'];
                    $movie_image_file = $row['image_file'];

                    if (empty($movie_image_file))
                    {
                        $movie_image_file_displayed = ML_UPLOAD_PATH . ML_DEFAULT_MOVIE_FILE_NAME;
                    }
                    else
                    {
                        $movie_image_file_displayed = $movie_image_file;
                    }

                    $checked_movie_genres = explode(', ', $movie_genre_text);
                }             
            }
            elseif (isset($_POST['edit_movie_submission'], $_POST['movie_title'],
                    $_POST['movie_rating'], $_POST['movie_director'],
                    $_POST['movie_running_time_in_minutes'], $_POST['id_to_update'],
                    $_POST['movie_image_file']))
            {
                $movie_title = $_POST['movie_title'];
                $movie_rating = $_POST['movie_rating'];
                $movie_director = $_POST['movie_director'];
                $movie_runtime = $_POST['movie_running_time_in_minutes'];
                $checked_movie_genres = $_POST['movie_genre_checkbox'];
                $id_to_update = $_POST['id_to_update'];
                $movie_image_file = $_POST['movie_image_file'];

                $movie_genre_text = "";

                if (isset($checked_movie_genres))
                {
                    $movie_genre_text = implode(", ", $checked_movie_genres);
                }

                if (empty($movie_image_file))
                {
                    $movie_image_file_displayed = ML_UPLOAD_PATH . ML_DEFAULT_MOVIE_FILE_NAME;
                }
                else 
                {
                    $movie_image_file_displayed = $movie_image_file;
                }

                /*
                Here is where we will deal with the file by calling validateMovieImageFile().
                This function will validate that the movie image file is not greater than 128
                characters, is the right image type (jpg/png/gif), and not greater than 512KB.
                This function will return an empty string ('') if the file validates successfully,
                otherwise, the string will contain error text to be output to the web page before
                redisplaying the form.
                */

                $file_error_message = validateMovieImageFile();

                if (empty($file_error_message))
                {
                    $movie_image_file_path = addMovieImageFileReturnPathLocation();

                    // IF new image selected, set it to be updated in the database.
                    if (!empty($movie_image_file_path))
                    {
                        // IF replacing an image (other than the default), remove it
                        if (!empty($movie_image_file))
                        {
                            removeMovieImageFile($movie_image_file);
                        }

                        $movie_image_file = $movie_image_file_path;
                    }

                    $query = "UPDATE movieListing SET title = '$movie_title', rating = '$movie_rating', " .
                            "director = '$movie_director', running_time_in_minutes = '$movie_runtime', " . 
                            "genre = '$movie_genre_text', image_file = '$movie_image_file' " .
                            "WHERE id = $id_to_update";

                    mysqli_query($dbc, $query)
                            or trigger_error('Error querying database movieListing: Failed to update movie listing', E_USER_ERROR);

                    $nav_link = 'moviedetails.php?id=' . $id_to_update;

                    header("Location: $nav_link");
                    exit();
                }
                else
                {
                    // echo error message
                    echo "<h5><p class='text-danger'>" . $file_error_message . "</p></h5>";
                }

            }
            else // Unintended page link -  No movie to edit, link back to index
            {
                header("Location: index.php");
                exit();
            }         
          ?>

        <div class="row">
          <div class="col">
            <form enctype="multipart/form-data" class="needs-validation" novalidate method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
              <div class="form-group row">
                <label for="movie_title" class="col-sm-3 col-form-label-lg">Title</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="movie_title" name="movie_title" value= '<?=$movie_title?>' placeholder="Title" required>
                  <div class="invalid-feedback">
                    Please provide a valid movie title.
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="movie_rating" class="col-sm-3 col-form-label-lg">Rating</label>
                <div class="col-sm-9">
                  <select class="custom-select" id="movie_rating" name="movie_rating" value= '<?=$movie_rating?>' required>
                    <option value="" disabled selected>Rating...</option>
                    <option value="G" <?=$movie_rating=='G'?'selected':''?>>G</option>
                    <option value="PG" <?=$movie_rating=='PG'?'selected':''?>>PG</option>
                    <option value="PG-13" <?=$movie_rating=='PG-13'?'selected':''?>>PG-13</option>
                    <option value="R" <?=$movie_rating=='R'?'selected':''?>>R</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a movie rating.
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="movie_director" class="col-sm-3 col-form-label-lg">Director</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="movie_director" name="movie_director" value= '<?=$movie_director?>' placeholder="Director" required>
                  <div class="invalid-feedback">
                    Please provide a valid movie director.
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="movie_running_time_in_minutes" class="col-sm-3 col-form-label-lg">Running Time (min)</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" id="movie_running_time_in_minutes" name="movie_running_time_in_minutes" value= '<?=$movie_runtime?>' placeholder="Running time (in minutes)" required>
                  <div class="invalid-feedback">
                    Please provide a valid running time in minutes.
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label-lg">Genre</label>
                <div class="col-sm-9">
          <?php
            foreach ($genres as $genre)
            {
              ?>
                  <div class="form-check form-check-inline col-sm-3">
                      <input class="form-check-input" type="checkbox"
                        id="movie_genre_checkbox_action_<?= $genre ?>"
                            name="movie_genre_checkbox[]"
                            value="<?=$genre?>" <?=in_array($genre, $checked_movie_genres)?'checked':''?>>
                      <label class="form-check-label"
                        for="movie_genre_checkbox_action_<?= $genre ?>"><?= $genre ?></label>
                  </div>
              <?php
            }
          ?>
                </div>
              </div>

              <div class="form-group row">
                <label for="movie_image_file" class="col-sm-3 col-form-label-lg">Movie Image File</label>
                <div class="col-sm-8">
                  <input type="file" class="form-control-file" id="movie_image_file" name="movie_image_file">
                </div>
              </div>


              <button class="btn btn-primary" type="submit" name="edit_movie_submission">Update Movie</button>
              <input type="hidden" name="id_to_update" value="<?= $id_to_edit ?>">
              <input type="hidden" name="movie_image_file" value="<?= $movie_image_file ?>">
            </form>
          </div>
          <div class="col-3">
            <img src="<?=$movie_image_file_displayed?>" class="img-thumbnail" style="max-height: 400px;" alt="Movie image">
          </div>
        </div>
        <script>
        // JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        </script>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
  </body>
</html>
