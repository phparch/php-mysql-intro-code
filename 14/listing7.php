if ($output_form): ?>
  <h2>Enter Full Name</h2>
  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="form-group">
      <label for="first_name">First Name</label>
      <input class="form-control" id="first_name" name="first_name" 
             value="<?= $first_name ?>" placeholder="First Name">
    </div>
    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input class="form-control" id="last_name" name="last_name" 
             value="<?= $last_name ?>" placeholder="Last Name">
    </div>
    <button type="submit" class="btn btn-primary" 
            name="submit">Submit Name</button>
  </form>
<?php endif; ?>