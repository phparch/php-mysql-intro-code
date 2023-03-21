<?php
/**
 * Purpose:     Finds the number of movies reserved by current user not in cart
 *
 * Description: Based on the $_SESSION['user_id'] and the $_SESSION['cart'] 
 *              movie ids, query for the movies reserved by the user and compare
 *              to the movies in the cart. The number of movies reserved not in
 *              the cart are returned. NOTE, if $_SESSION['user_id'] is not set, 
 *              0 is returned and if $_SESSION['cart'] is not set, the number 
 *              of reservations for the user is returned (asumming 
 *              $_SESSION['user_id'] is set).
 *
 * @return int  The number of movies reserved by the user not in the cart, 
 *              or 0 if $_SESSION['user_id'] is not set.
 */
function numberOfMoviesReservedNotInCart()
{
    $number_of_movies_reserved = 0;
    $number_of_movies_reserved_in_cart = 0;

    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    
    if (!isset($_SESSION['user_id']))
    {
        return 0;
    }

    require_once('dbconnection.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
           or trigger_error(
              'Error connecting to MySQL server for' . DB_NAME, 
               E_USER_ERROR
           );

    $user_id = $_SESSION['user_id'];

    $query = "SELECT movieListing_id FROM reservation WHERE user_id = ?";
    $result = parameterizedQuery($dbc, $query, 'i', $user_id)
               or trigger_error('Error querying database movieListing', 
                      E_USER_ERROR);

    $number_of_movies_reserved = mysqli_num_rows($result);

    if (!isset($_SESSION['cart']))
    {
        return $number_of_movies_reserved;
    }

    $movies_in_cart = $_SESSION['cart'];

    while ($row = mysqli_fetch_assoc($result))
    {
        // Accumulate count of reserved movies in cart
        if (array_search($row['movieListing_id'], $movies_in_cart) !== false)
        {
            $number_of_movies_reserved_in_cart++;
        }
    }
    
    return $number_of_movies_reserved - $number_of_movies_reserved_in_cart;
}