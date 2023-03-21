else
{
    ?>
    <form class="needs-validation" novalidate method="POST" 
          action="<?= $_SERVER['PHP_SELF'] ?>">
      <div class="form-group">
        <label for="name"><h4>What is your name?</h4></label>
        <input type="test" class="form-control" id="entered_name" 
               name="entered_name" placeholder="Enter your name" required>
      </div>
      <button type="submit" class="btn btn-primary" 
              name="name_submission">Submit</button>
    </form>
    <?php
}