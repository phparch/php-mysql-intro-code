// Check for $_FILES being set and no errors.
if (isset($_FILES) && $_FILES['movie_image_file']['error'] == UPLOAD_ERR_OK)
{
    // ...
    $image_type = $_FILES['movie_image_file']['type'];

    if ($image_type != 'image/jpg' && $image_type != 'image/jpeg' && $image_type != 'image/pjpeg'
        && $image_type != 'image/png' && $image_type != 'image/gif')
    {
        if (empty($error_message))
        {
            $error_message = "The movie file image must be of type jpg, png, or gif.";
        }
        else
        {
            $error_message .= ", and be an image of type jpg, png, or gif.";
        }
    }
}
