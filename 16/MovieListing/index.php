<html>
  <head>
    <title>Movies I Like</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <div class="card">
      <div class="card-body">
        <h1>Movies I Like</h1>
        <p>If you have a movie you would like to include, feel free to <a href='addmovie.php'> add one</a></p>
        <?php
            require_once('dbconnection.php');

            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

            $query = "SELECT id, title FROM movieListing ORDER BY title";

            $result = mysqli_query($dbc, $query)
                    or trigger_error('Error querying database movieListing', E_USER_ERROR);

            if (mysqli_num_rows($result) > 0):
        ?>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Movie Title</th>
            </tr>
          </thead>
          <tbody>
        <?php
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr class='nav'><td class='nav-item'>" .
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
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>