<html>
  <head>
    <title>Form for Entering Full Name</title>
  </head>
  <body>
    <?php if (!isset($_POST['submit'])) { ?>
      <h2>Enter Full Name</h2>
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        First name:<br/>
        <input type="text" name="first_name"/><br/>
        Last name:<br/>
        <input type="text" name="last_name"/><br/>
        <p>
        <input type="submit" name="submit" value="Submit Name" />
      </form>
    <?php } else { ?>
      <h2>Greetings!</h2>
        <p>Hello <?= $_POST['first_name'] . " " . $_POST['last_name'] ?>
           Thanks for submitting the form!</p>
    <?php } ?>
  </body>
</html>