  $display_add_movie_form = false;
?>
  <h3 class="text-info">The Following Movie Details were Added:</h3><br/>

  <h1><?= $movie_title ?></h1>
  <table class="table table-striped">
      <tbody>
      <tr>
          <th scope="row">Rating</th>
          <td><?= $movie_rating ?></td>
      </tr>
      <tr>
          <th scope="row">Director</th>
          <td><?= $movie_director ?></td>
      </tr>
      <tr>
          <th scope="row">Running Time (minutes)</th>
          <td><?= $movie_runtime ?></td>
      </tr>
      <tr>
          <th scope="row">Genre</th>
          <td><?= $movie_genre_text ?></td>
      </tr>
      </tbody>
  </table>
  <hr/>
  <p>Would you like to <a href='<?= $_SERVER['PHP_SELF'] ?>'> add another movie</a>?</p>
<?php
  }

  if ($display_add_movie_form) {