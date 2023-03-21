<?php
    $genres = [
       'Action', 'Adventure', 'Comedy', 'Documentary', 'Drama',
       'Fantasy', 'Horror', 'Romance', 'Science Fiction'
    ];
?>
...
<?php
    foreach ($genres as $genre)
    {
?>
        <div class="form-check form-check-inline col-sm-3">
            <input class="form-check-input" type="checkbox"
                   id="movie_genre_checkbox_action"
                   name="movie_genre_checkbox[]"
                   value="<?= $genre ?>">
            <label class="form-check-label"
                   for="movie_genre_checkbox_action"><?= $genre ?></label>
        </div>
<?php
    }
?>