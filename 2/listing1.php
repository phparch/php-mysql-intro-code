<html>
  <head>
    <title>PHP-Hello World!</title>
  </head>
  <body>
    <?php
        echo "<h1>Hello World!</h1><br/>";
        date_default_timezone_set("America/Chicago");
        echo "<h2>Today is: " . date('l jS \of F Y h:i:s A') . "</h2><br/>";
    ?>
  </body>
</html>