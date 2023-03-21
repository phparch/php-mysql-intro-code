<?php
require_once 'movielistingfileconstants.php';

/**
 * Purpose:         Validates an uploaded movie image file
 *
 * Description:     Validates an uploaded movie image file is not greater than ML_MAX_FIE (1/2 MB),
 *                  and is either a jpg or png image type, and has no errors. If the image file
 *                  validates to these constraints, an error message containing an empty string is
 *                  returned. If there is an error, a string containing constraints the file failed
 *                  to validate to are returned.
 *
 * @return string   Empty if validation is successful, otherwise error string containing
 *                  constraints the image file failed to validate to.
 */
function validateMovieImageFile()
{
    $error_message = "";

    // Check for $_FILES being set and no errors.
    if (isset($_FILES) && $_FILES['movie_image_file']['error'] == UPLOAD_ERR_OK)
    {
        // Check for uploaded file < Max file size AND an acceptable image type
        if ($_FILES['movie_image_file']['size'] > ML_MAX_FILE_SIZE)
        {
            $error_message = "The movie file image must be less than " . ML_MAX_FILE_SIZE . " Bytes";
        }

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
    elseif (isset($_FILES) && $_FILES['movie_image_file']['error'] != UPLOAD_ERR_NO_FILE
        && $_FILES['movie_image_file']['error'] != UPLOAD_ERR_OK)
    {
        $error_message = "Error uploading movie image file.";
    }

    return $error_message;
}

/**
 * Purpose:         Moves an uploaded movie image file to the ML_UPLOAD_PATH (images/) folder and
 *                  return the path location.
 *
 * Description:     Moves an uploaded movie image file from the temporary server location to the
 *                  ML_UPLOAD_PATH (images/) folder IF a movie image file was uploaded and returns
 *                  the path location of the uploaded file by appending the file name to the
 *                  ML_UPLOAD_PATH (e.g. images/movie_image.png). IF a movie image file was NOT
 *                  uploaded, an empty string will be returned for the path.
 *
 * @return string   Path to movie image file IF a file was uploaded AND moved to the ML_UPLOAD_PATH
 *                  (images/) folder, otherwise and empty string.
 */
function addMovieImageFileReturnPathLocation()
{
    $movie_file_path = "";

    // Check for $_FILES being set and no errors.
    if (isset($_FILES) && $_FILES['movie_image_file']['error'] == UPLOAD_ERR_OK)
    {
        $movie_file_path = ML_UPLOAD_PATH . $_FILES['movie_image_file']['name'];

        if (!move_uploaded_file($_FILES['movie_image_file']['tmp_name'], $movie_file_path))
        {
            $movie_file_path = "";
        }
    }

    return $movie_file_path;
}

/**
 * @param $movie_file_path
 */
function removeMovieImageFile($movie_file_path)
{
    @unlink($movie_file_path);
}
