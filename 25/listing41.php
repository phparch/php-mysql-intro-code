elseif (isset($_POST['reserve_movies'])):

    // Delete the shopping cart (it's already in the reservation table),
    // and route back to the Home page
    unset($_SESSION['cart']);

    header("Location: " . dirname($_SERVER['PHP_SELF']));
    exit;

elseif (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0):