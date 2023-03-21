<form enctype="multipart/form-data" class="needs-validation"
      novalidate method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div class="form-group row">
        <label for="movie_title" class="col-sm-3 col-form-label-lg">Title</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="movie_title"
                   name="movie_title" value='<?= $movie_title ?>'
                   placeholder="Title" required>
            <div class="invalid-feedback">
                Please provide a valid movie title.
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="movie_rating" class="col-sm-3 col-form-label-lg">Rating</label>
        <div class="col-sm-8">
            <select class="custom-select" id="movie_rating"
                    name="movie_rating" value='<?= $movie_rating ?>'
                    required>
                <option value="" disabled selected>Rating...</option>
                <option value="G" <?= $movie_rating == 'G' ?
                   'selected' : '' ?>>G
                </option>
                <option value="PG" <?= $movie_rating == 'PG' ?
                   'selected' : '' ?>>PG
                </option>
                <option value="PG-13" <?= $movie_rating == 'PG-13' ?
                   'selected' : '' ?>>PG-13
                </option>
                <option value="R" <?= $movie_rating == 'R' ?
                   'selected' : '' ?>>R
                </option>
            </select>
            <div class="invalid-feedback">
                Please select a movie rating.
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="movie_director"
               class="col-sm-3 col-form-label-lg">Director</label>
        <div class="col-sm-8">
            <input type="text" class="form-control"
                   id="movie_director" name="movie_director"
                   value='<?= $movie_director ?>'
                   placeholder="Director" required>
            <div class="invalid-feedback">
                Please provide a valid movie director.
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="movie_running_time_in_minutes"
               class="col-sm-3 col-form-label-lg">Running Time
            (min)</label>
        <div class="col-sm-8">
            <input type="number" class="form-control"
                   id="movie_running_time_in_minutes"
                   name="movie_running_time_in_minutes"
                   value='<?= $movie_runtime ?>'
                   placeholder="Running time (in minutes)" required>
            <div class="invalid-feedback">
                Please provide a valid running time in minutes.
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 col-form-label-lg">Genre</label>
        <div class="col-sm-8">
           <?php
           foreach ($genres as $genre) {
              ?>
               <div class="form-check form-check-inline col-sm-3">
                   <input class="form-check-input" type="checkbox"
                          id="movie_genre_checkbox_action_<?= $genre ?>"
                          name="movie_genre_checkbox[]"
                          value="<?= $genre ?>"<?= in_array($genre, $checked_movie_genres) ?
                      'checked' : '' ?>>
                   <label class="form-check-label"
                          for="movie_genre_checkbox_action_<?= $genre ?>"><?= $genre ?></label>
               </div>
              <?php
           }
           ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="movie_image_file"
               class="col-sm-3 col-form-label-lg">Movie Image File</label>
        <div class="col-sm-8">
            <input type="file" class="form-control-file"
                   id="movie_image_file" name="movie_image_file">
        </div>
    </div>
    <button class="btn btn-primary" type="submit"
            name="add_movie_submission">Add Movie
    </button>
</form>