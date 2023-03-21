<?php
    foreach ($genres as $genre) {
?>
      <div class="form-check form-check-inline col-sm-3">
        <input class="form-check-input" type="checkbox"
            id="movie_genre_checkbox_action_<?= $genre ?>"
            name="movie_genre_checkbox[]"
            value="<?= $genre ?>" <?=in_array($genre, $checked_movie_genres) ? 'checked' : '' ?>>
        <label class="form-check-label"
            for="movie_genre_checkbox_action_<?= $genre ?>"><?= $genre ?></label>
      </div>
<?php
    }
?>
