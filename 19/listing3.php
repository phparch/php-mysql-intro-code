function validateMovieImageFile()
{
    $error_message = "";


    // Check for $_FILES being set and no errors.
    if (isset($_FILES) && $_FILES['movie_image_file']['error'] == UPLOAD_ERR_OK)
    {
        ...
    }
    elseif (isset($_FILES) && $_FILES['movie_image_file']['error'] != UPLOAD_ERR_NO_FILE
            && $_FILES['movie_image_file']['error'] != UPLOAD_ERR_OK)
    {
        $error_message = "Error uploading movie image file.";
    }

    return $error_message;
}