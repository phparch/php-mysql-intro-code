<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col"><h4>Movie Titles</h4></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
<?php
    while ($row = mysqli_fetch_assoc($result))
    {
        // ...

        echo "<tr><td><img src=''" . $movie_image_file . "' class='img-thumbnail'"
             . "style='max-height: 75px;' alt='Movie image'></td>"
             . "<td class='align-middle'><a class='nav-link' href='moviedetails.php?id="
             . $row['id'] . "'>" . $row['title'] ."</a></td>"
             . "<td class='align-middle'><a class='nav-link' href='removemovie.php?id_to_delete="
             . $row['id'] ."'><i class='fas fa-trash-alt'></i></a></td></tr>";
    }
?>
  </tbody>
</table>