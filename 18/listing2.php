<body>
  <div class="card">
    <div class="card-body">
      <h1>Edit a Movie</h1>
      <p><a class='nav-link' href='index.php'>Movies I Like</a></p>
      <hr/>
        <?php
          require_once('dbconnection.php');

          $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
              or trigger_error(
              'Error connecting to MySQL server for' . DB_NAME,
              E_USER_ERROR
              );
