<html>
  <head>
    <title>Full Name</title>
  </head>
  <body>
    <h2>Greetings!</h2>
      Hello <?= $_POST['first_name'] . " " . $_POST['last_name'] ?>
      Thanks for submitting the form!
      <br/>
      <?php print_r($_POST) ?>
  </body>
</html>
