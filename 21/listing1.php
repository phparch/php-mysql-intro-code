<body>
<div class="card">
  <div class="card-body">
     <h1>Using Cookies</h1>
    <?php
    // User entered name. Save name to Cookie and display form
    if (isset($_POST['name_submission']) && isset($_POST['entered_name'])) {
       setcookie('name', $_POST['entered_name']);
       // ...
    } // User entered favorite cookie, save favorite cookie to Cookie and redirect to this page
    elseif (isset($_POST['cookie_submission']) && isset($_POST['entered_cookie'])) {
       setcookie('favorite_cookie', $_POST['entered_cookie']);

       header("Location: {$_SERVER['PHP_SELF']}");
       exit;
    } // Output message displaying saved Cookies then delete the Cookies
    elseif (isset($_COOKIE['name']) && isset($_COOKIE['favorite_cookie'])) {
       // ...
       setcookie('name', '', time() - 3600);
       setcookie('favorite_cookie', '', time() - 3600);
    } // Initial navigation to this page, display form asking for name
    else {
       // ...
    }
    ?>
  </div>
</div>
...
</body>