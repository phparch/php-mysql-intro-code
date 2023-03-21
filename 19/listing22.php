while ($row = mysqli_fetch_assoc($result))
{
    $movie_image_file = $row['image_file'];

    if (empty($movie_image_file))
    {
        $movie_image_file = ML_UPLOAD_PATH . ML_DEFAULT_MOVIE_FILE_NAME;
    }

    echo "<tr><td><img src=" . $movie_image_file . " class='img-thumbnail'" .
            "style='max-height: 75px;' alt='Movie image'></td>" .
            "<td class='align-middle'><a class='nav-link' href='moviedetails.php?id=" .
            $row['id'] . "'>" . $row['title'] ."</a></td>" .
            "<td class='align-middle'><a class='nav-link' href='removemovie.php?id_to_delete=" .
            $row['id'] ."'><i class='fas fa-trash-alt'></i></a></td></tr>";
}