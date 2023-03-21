        $result = mysqli_query($dbc, $query)
                or trigger_error('Error querying database movieListing', E_USER_ERROR);

        if (mysqli_num_rows($result) == 1):

        else:
    ?>
<h3>No Movie Details :-(</h3>
<?php
        endif;
    else:
?>
<h3>No Movie Details :-(</h3>
<?php
    endif;           
?>