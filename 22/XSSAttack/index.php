<html>
  <head>
    <title>Open Inventory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <?php $search_term = isset($_POST['search']) ? $_POST['search'] : ''; ?>
    <div class="card">
      <div class="card-body ">
        <div class="alert alert-info">
          <h1>Stuff I'm Selling</h1>
        </div>
        <br/>
        <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
          <div class="form-group">
            <label for="name"><h4>What kind of stuff are you looking for?</h4></label>
            <input type="test" class="form-control" name="search" value= '<?=filter_var($search_term, FILTER_SANITIZE_STRING)?>' placeholder="Enter some stuff">
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>
      <?php
          if (isset($_POST['submit']))
          {
              require_once('dbconnection.php');

              $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                      or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

              $search_term = isset($_POST['search']) ? $_POST['search'] : '';

              $search_term = filter_var($search_term, FILTER_SANITIZE_STRING);
      ?>
        <div class="card-body">
          <div class="alert alert-primary">
            <h2>Stuff you might be interested in as a result of searching for <span class="text-danger"><?= $search_term?></span>...</h2>
            <br/>
          </div>
        </div>
      <?php
              // Parameterized Query
              $query = "SELECT ProductName, UnitsInStock, UnitPrice FROM Products "
                      . "WHERE ProductName LIKE ?";
              $stmt = mysqli_prepare($dbc, $query);
              $search_term = '%' . $search_term . '%';
              mysqli_stmt_bind_param($stmt, 's', $search_term);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              if (mysqli_num_rows($result) > 0):
      ?>
      <div class="card-body">
        <div class="alert alert-success">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Units in Stock</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                ?>
            <tbody>
              <tr>
                <td><?=$row['ProductName']?></td>
                <td><?=$row['UnitsInStock']?></td>
                <td><?=$row['UnitPrice']?></td>
              </tr>
           </tbody>
                <?php
                    }
                ?>
          </table>
        </div>
      </div>
      <?php
              endif;
          }
      ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>