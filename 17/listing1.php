<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Movie Title</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
<?php
   while($row = mysqli_fetch_assoc($result))
   {
      echo "<tr><td><a class='nav-link' href='moviedetails.php?id="
           . $row['id'] . "'>" . $row['title'] ."</a></td>"
           . "<td><a class='nav-link' href='removemovie.php?id_to_delete="
           . $row['id'] ."'><i class='fas fa-trash-alt'></i></a></td></tr>";
   }
?>
  </tbody>
</table>