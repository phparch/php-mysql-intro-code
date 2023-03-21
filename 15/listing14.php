<?php
// ...
        if (mysqli_num_rows($result) == 1):

            $row = mysqli_fetch_assoc($result)
    ?>
<h1><?= $row['title'] ?></h1>
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
    <?php
        else:
    ?>
<h3>No Movie Details :-(</h3>
<?php
        endif;           
    else:
?>
<h3>No Movie Details :-(</h3>
<?php
    endif;           
?>