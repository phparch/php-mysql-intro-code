<!DOCTYPE html>
<?php
  require_once('pagetitles.php');
  $page_title = MR_RESERVE_MOVIE_PAGE;
?>
<html>
  <head>
    <title><?= $page_title ?></title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
          crossorigin="anonymous">
  </head>
  <body>
  <?php
    require_once('navmenu.php');
  ?>
    <div class="card">
      <div class="card-body">
        <h1>Reserve Movie</h1>
        <?php
            require_once('dbconnection.php');
            require_once('movieimagefileutil.php');

            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or trigger_error(
                        'Error connecting to MySQL server for' . DB_NAME, 
                        E_USER_ERROR
                   );

            if (isset($_POST['add_to_cart']) && isset($_POST['id'])):

                // ...

            elseif (isset($_GET['id_to_reserve'])):
                // ...
            else: // Unintended page link - No movie to reserve, redirect to index

                header("Location: " . dirname($_SERVER['PHP_SELF']));
                exit();

            endif;
        ?>
      </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
          crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
          integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
          crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
          integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
          crossorigin="anonymous"></script>
  </body>
</html>