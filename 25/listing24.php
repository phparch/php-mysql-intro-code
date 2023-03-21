/**
 * Purpose:     Determines the number of movies reserved by a user
 *
 * Description: Given a user id, a query is made for the number of movies
 *              reserved by this user. This number is returned.
 *
 * @param       $user_id
 * @return int  The number of movies reserved by this user.
 */
function numberOfMoviesReservedByUser($user_id)
{
    require_once('dbconnection.php');
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
             or trigger_error(
                  'Error connecting to MySQL server for' . DB_NAME, 
                  E_USER_ERROR
             );

    $query = "SELECT COUNT(id) FROM reservation WHERE user_id = ?";

    $result = parameterizedQuery($dbc, $query, 'i', $user_id)
                 or trigger_error('Error querying database movieListing', 
                                  E_USER_ERROR);
                        
    $retval = 0;
    
    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_row($result);
        $retval = $row['total'];
    }
    
    return $retval;
}