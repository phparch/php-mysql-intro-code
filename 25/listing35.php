<?php
if (isset($_POST['add_to_cart']) && isset($_POST['id'])):

    $movie_id = $_POST['id'];

    // Query if movie is still reservable
    $query = "SELECT id FROM movieListing 
              WHERE id = ? AND number_of_copies - number_reserved > 0";
    $result = parameterizedQuery($dbc, $query, 'i', $movie_id);

    if(mysqli_errno($dbc))
    {
        trigger_error('Error querying database movieListing', E_USER_ERROR);
    }

    // Reserve movie if it's reservable, update the number of reserved copies
    //  in movieListing for reserved movies, and add it to the cart
    if (mysqli_num_rows($result) == 1 && isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO reservation (user_id, movieListing_id) VALUES (?, ?)";
        $result = parameterizedQuery($dbc, $query, 'ii', $user_id, $movie_id);

        if (mysqli_errno($dbc))
        {
            trigger_error('Error querying database movieListing.reservation', E_USER_ERROR);
        }
        
        $query = "UPDATE movieListing SET number_reserved = number_reserved + 1 WHERE id = ?";
        $result = parameterizedQuery($dbc, $query, 'i', $movie_id);

        if (mysqli_errno($dbc))
        {
            trigger_error('Error querying database movieListing.reservation', E_USER_ERROR);
        }
                
        if (isset($_SESSION['cart']))
        {
            array_push($_SESSION['cart'], $movie_id);
        }
        else
        {
            $_SESSION['cart'] = [$movie_id];
        }
    }

    header("Location: " . dirname($_SERVER['PHP_SELF']));
    exit;
        
elseif (isset($_GET['id_to_reserve'])):