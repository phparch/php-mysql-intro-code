<body>
  ...
      <nav class="nav">
        <a class="nav-link" href="index.php">Movies I Like</a>
      </nav>        
      <?php
          if (isset($_GET['id'])):

              require_once('dbconnection.php');

              $id = $_GET['id'];

              $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                      or trigger_error('Error connecting to MySQL server for ' . DB_NAME, E_USER_ERROR);

              $query = "SELECT * FROM movieListing WHERE id = $id";

              $result = mysqli_query($dbc, $query)
                      or trigger_error('Error querying database movieListing', E_USER_ERROR);

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
  ...
</body>