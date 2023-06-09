<!DOCTYPE html>
<?php
  require_once('pagetitles.php');
  $page_title = MR_SIGNUP_PAGE;
?>
<html>
  <head>
    <title><?= $page_title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  </head>
  <body>
  <?php
    require_once('navmenu.php');
  ?>
    <div class="card">
      <div class="card-body">
        <h1>Sign up for a Movie Reservations Account</h1>
        <hr/>
          <?php
            $show_sign_up_form = true;

            if (isset($_POST['signup_submission']))
            {
                // Get user name and password
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                
                if (!empty($user_name) && !empty($password))
                {
                    require_once('dbconnection.php');

                    require_once('queryutils.php');

                    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                            or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

                    // Check if user already exists
                    $query = "SELECT * FROM user WHERE user_name = ?";

                    $results = parameterizedQuery($dbc, $query, 's', $user_name);

                    // IF user does not exist, create an account for them
                    if (mysqli_num_rows($results) == 0)
                    {
                        $salted_hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        $query = "INSERT INTO user (`user_name`, `password_hash`) VALUES (?, '$salted_hashed_password')";
                        $results = parameterizedQuery($dbc, $query, 's', $user_name);

                        // Direct the user to the login page
                        echo "<h4><p class='text-success'>Thank you for signing up <strong>$user_name</strong>! "
                                . "Your new account has been successfully created.<br/>"
                                . "You're now ready to <a href='login.php'>log in</a>.</p></h4>";

                        $show_sign_up_form = false;
                    }
                    else // An account already exists for this user
                    {
                        echo "<h4><p class='text-danger'>An account already exists for this username:<span class='font-weight-bold'> ($user_name)</span>. Please use a different user name.</p></h4><hr/>";
                    }
                }
                else
                {
                    // Output error message
                    echo "<h4><p class='text-danger'>You must enter both a user name and password.</p></h4><hr/>";
                }
            }
            if ($show_sign_up_form):
          ?>
        <form class="needs-validation" novalidate method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
          <div class="form-group row">
            <label for="user_name" class="col-sm-2 col-form-label-lg">User Name</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter a user name" required>
              <div class="invalid-feedback">
                Please provide a valid user name.
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label-lg">Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter a password" required>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="show_password_check" onclick="togglePassword()">
                <label class="form-check-label" for="show_password_check">Show Password</label>
              </div>
              <div class="invalid-feedback">
                Please provide a valid password.
              </div>
            </div>
          </div>
          <button class="btn btn-primary" type="submit" name="signup_submission">Sign Up</button>
        </form>
          <?php
            endif;
          ?>
      </div>
    </div>
    <script>
        // JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        // JavaScript function for toggling between showing and hiding the entered password
        function togglePassword() {
            var password_entry = document.getElementById("password");
            if (password_entry.type === "password") {
                password_entry.type = "text";
            } else {
                password_entry.type = "password";
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>