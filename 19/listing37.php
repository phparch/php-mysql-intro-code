elseif (isset($_GET['id_to_delete'])):
    // ...
    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        $movie_image_file = $row['image_file'];

        if (empty($movie_image_file))
        {
            $movie_image_file = ML_UPLOAD_PATH . ML_DEFAULT_MOVIE_FILE_NAME;
        }