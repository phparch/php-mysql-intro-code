/**
 * Purpose:     Determines if a movie is currently reserved by a user
 *
 * Description: Given a movie id and a user id, queries to see if this user has 
 *              this movie reserved. If so, true is returned, otherwise false.
 *
 * @param       $movie_id
 * @param       $user_id
 * @return bool True if this movie is reserved by this user, otherwise false.
 */
function isMovieReservedByUser($movie_id, $user_id)
{
    require_once('dbconnection.php');

    $ret_val = false;  // Assume failure

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
             or trigger_error(
                  'Error connecting to MySQL server for' . DB_NAME, 
                  E_USER_ERROR
             );

    $query = "SELECT id FROM reservation 
              WHERE movieListing_id = ? AND user_id = ?";

    $result = parameterizedQuery($dbc, $query, 'ii', $movie_id, $user_id)
                or trigger_error('Error querying database movieListing', 
                                 E_USER_ERROR);

    if (mysqli_num_rows($result) == 1)
    {
        $ret_val = true;
    }

    return $ret_val;
}