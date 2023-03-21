<?php

/**
 * Purpose:         Parameterizes a database query
 *
 * Description:     Parameterizes an SQL query given a database connection, a query string, a data
 *                  types string, and a variable number of parameters to be used in the query. If
 *                  the query is successful, the database results object will be returned (or TRUE
 *                  if no results set and the query was successful), otherwise FALSE will be returned
 *                  and the connection will have to be queried for the last error.
 *
 * @param           $dbc database connection
 * 
 * @param           $sql_query SQL statement
 * 
 * @param           $data_types string containing a single character representing the data type for each parameter
 * 
 * @param           $query_parameters a variable list of parameters representing each query parameter
 * 
 * @return string   Database results set, otherwise false if there is a database error, or true if successful.
 */
function parameterizedQuery($dbc, $sql_query, $data_types, ...$query_parameters)
{
    $ret_val = false;  // Assume failure

    if ($stmt = mysqli_prepare($dbc, $sql_query))
    {
        if (mysqli_stmt_bind_param($stmt, $data_types, ...$query_parameters)
                && mysqli_stmt_execute($stmt))
        {
            $ret_val = mysqli_stmt_get_result($stmt);
            if (!mysqli_errno($dbc) && !$ret_val)
            {
                $ret_val = true;
            }
        }       
    }
    return $ret_val;
}

/**
 * Purpose:         Determines if a movie is currently reserved by a user
 *
 * Description:     Given a movie id and a user id, a query is made to see if this user has this
 *                  movie reserved. If so, true is returned, otherwise false.
 *
 * @param           $movie_id
 * 
 * @param           $user_id
 * 
 * @return bool     True if this movie is reserved by this user, otherwise false.
 */
function isMovieReservedByUser($movie_id, $user_id)
{
    require_once('dbconnection.php');

    $ret_val = false;  // Assume failure

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

    $query = "SELECT id FROM reservation WHERE movieListing_id = ? AND user_id = ?";

    $result = parameterizedQuery($dbc, $query, 'ii', $movie_id, $user_id)
            or trigger_error('Error querying database movieListing', E_USER_ERROR);

    if (mysqli_num_rows($result) == 1)
    {
        $ret_val = true;
    }
    return $ret_val;
}

/**
 * Purpose:         Determines the number of movies reserved by a user
 *
 * Description:     Given a user id, a query is made for the number of movies
 *                  reserved by this user. This number is returned.
 *
 * @param           $user_id
 * 
 * @return int      The number of movies reserved by this user.
 */
function numberOfMoviesReservedByUser($user_id)
{
    require_once('dbconnection.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

    $query = "SELECT id FROM reservation WHERE user_id = ?";

    $result = parameterizedQuery($dbc, $query, 'i', $user_id)
            or trigger_error('Error querying database movieListing', E_USER_ERROR);

    return mysqli_num_rows($result);
}

/**
 * Purpose:         Determines the number of movies reserved by current user not in cart
 *
 * Description:     Based on the $_SESSION['user_id'] and the $_SESSION['cart'] containing
 *                  movie ids, a query is made for the movies reserved by the user and
 *                  compared to the movies in the cart. The number of movies reserved not in
 *                  the cart are returned. NOTE, if $_SESSION['user_id'] is not set, 0 is
 *                  returned and if $_SESSION['cart'] is not set, the number of reservations
 *                  for the user is returned (asumming $_SESSION['user_id'] is set).
 *
 * @return int      The number of movies reserved by the user not in the cart, or 0 if
 *                  $_SESSION['user_id'] is not set.
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
            or trigger_error('Error connecting to MySQL server for DB_NAME.', E_USER_ERROR);

    $user_id = $_SESSION['user_id'];

    $query = "SELECT movieListing_id FROM reservation WHERE user_id = $user_id";

    $result = mysqli_query($dbc, $query)
            or trigger_error('Error querying database movieListing', E_USER_ERROR);

    $number_of_movies_reserved = mysqli_num_rows($result);

    if (!isset($_SESSION['cart']))
    {
        return $number_of_movies_reserved;
    }

    $movies_in_cart = $_SESSION['cart'];

    while($row = mysqli_fetch_assoc($result))
    {
        // Accumulate count of reserved movies in cart
        if (array_search($row['movieListing_id'], $movies_in_cart) !== false)
        {
            $number_of_movies_reserved_in_cart++;
        }
    }
    
    return $number_of_movies_reserved - $number_of_movies_reserved_in_cart;
}