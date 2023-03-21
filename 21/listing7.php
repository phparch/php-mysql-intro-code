<?php
session_start(); // Start or resume the current session so we can access session variables
?>
<html>
<head>
    <title>Using Session Variables</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
          crossorigin="anonymous">
</head>
<body>
<div class="card">
    <div class="card-body">
        <h1>Using Session Variables</h1>
       <?php
       // User entered name, save name to Session variable and display form asking for favorite cookie
       if (isset($_POST['name_submission']) && isset($_POST['entered_name'])) {
          $_SESSION['name'] = $_POST['entered_name'];
          ?>
           <form class="needs-validation" novalidate method="POST"
                 action="<?= $_SERVER['PHP_SELF']; ?>">
               <div class="form-group">
                   <label for="name"><h4>What is your favorite
                           cookie?</h4></label>
                   <input type="test" class="form-control"
                          id="entered_cookie" name="entered_cookie"
                          placeholder="Enter a cookie you like to eat"
                          required>
               </div>
               <button type="submit" class="btn btn-primary"
                       name="cookie_submission">Submit
               </button>
           </form>
          <?php
       } // User entered favorite cookie, save session variable and redirect to this page
       elseif (isset($_POST['cookie_submission']) && isset($_POST['entered_cookie'])) {
          $_SESSION['favorite_cookie'] = $_POST['entered_cookie'];

          header("Location: {$_SERVER['PHP_SELF']}");
          exit;
       }
       // Output message displaying saved Session variables
       // then end the current session and delete the Session variables
       elseif (isset($_SESSION['name']) && isset($_SESSION['favorite_cookie'])) {
          ?>
           <h4>
               Hey <?= $_SESSION['name'] ?>, you like
               <?= $_SESSION['favorite_cookie'] ?> cookies. Very nice!
           </h4>
          <?php
          session_destroy();  // End the current session
          $_SESSION =
             []; // Destroy all session variables in the current session
       } // Initial navigation to this page, display form asking for name
       else {
          ?>
           <form class="needs-validation" novalidate method="POST"
                 action="<?= $_SERVER['PHP_SELF'] ?>">
               <div class="form-group">
                   <label for="name"><h4>What is your name?</h4>
                   </label>
                   <input type="test" class="form-control"
                          id="entered_name" name="entered_name"
                          placeholder="Enter your name" required>
               </div>
               <button type="submit" class="btn btn-primary"
                       name="name_submission">Submit
               </button>
           </form>
          <?php
       }
       ?>
    </div>
</div>
<script>
   // JavaScript for disabling form submissions if there are invalid fields
   (function () {
      'use strict';
      window.addEventListener('load', function () {
         // Fetch all the forms we want to apply custom Bootstrap validation styles to
         var forms = document.getElementsByClassName('needs-validation');
         // Loop over them and prevent submission
         var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
               if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
               }
               form.classList.add('was-validated');
            }, false);
         });
      }, false);
   })();
</script>
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