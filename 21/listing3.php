if (isset($_POST['name_submission']) && isset($_POST['entered_name']))
{
    setcookie('name', $_POST['entered_name']);
?>
<form class="needs-validation" novalidate method="POST" 
      action="<?= $_SERVER['PHP_SELF'] ?>">
  <div class="form-group">
    <label for="name"><h4>What is your favorite cookie?</h4></label>
    <input type="test" class="form-control" id="entered_cookie" 
           name="entered_cookie" placeholder="Enter a cookie you like to eat" 
           required>
  </div>
  <button type="submit" class="btn btn-primary" 
          name="cookie_submission">Submit</button>
</form>
<?php
}