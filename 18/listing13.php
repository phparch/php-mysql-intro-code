$query = "UPDATE movieListing SET title = '$movie_title', rating = '$movie_rating', "
       . "director = '$movie_director', running_time_in_minutes = '$movie_runtime', "
       . "genre = '$movie_genre_text' "
       . "WHERE id = $id_to_update";

mysqli_query($dbc, $query)
   or trigger_error(
       'Error querying database movieListing: Failed to update movie listing', 
       E_USER_ERROR
   );