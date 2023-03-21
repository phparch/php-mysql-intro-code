<body>
   ///...
      <h1>Movies I Like</h1>

      <?php
         require_once('dbconnection.php');

         $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                  or trigger_error(
                    'Error connecting to MySQL server for' . DB_NAME, E_USER_ERROR
                  );

         $query = "SELECT id, title FROM movieListing ORDER BY title";

         $result = mysqli_query($dbc, $query)
              or trigger_error('Error querying database movieListing', E_USER_ERROR);

         if (mysqli_num_rows($result) > 0):
      ?>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Movie Title</th>
                    </tr>
                  </thead>
                  <tbody>
        <?php
              while($row = mysqli_fetch_assoc($result))
              {
                  echo "<tr><td>" .
                          "<a class='nav-link' href='moviedetails.php?id=" . $row['id'] .
                          "'>" . $row['title'] . "</a></td></tr>";
              }
        ?>
                  </tbody>
                </table>        
      <?php
          else:
      ?>
      <h3>No Movies Found :-(</h3>
      <?php
          endif;           
      ?>
  ...
</body>