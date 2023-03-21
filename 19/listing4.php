// Check for $_FILES being set and no errors.
if (isset($_FILES) && $_FILES['movie_image_file']['error'] == UPLOAD_ERR_OK)
{
    // Check for uploaded file < Max file size AND an acceptable image type
    if ($_FILES['movie_image_file']['size'] > ML_MAX_FILE_SIZE)
    {
        $error_message = "The movie file image must be less than " . ML_MAX_FILE_SIZE . " Bytes";
    }
    //...
}
