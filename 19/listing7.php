/**
 * Purpose:        Moves an uploaded movie image file to the ML_UPLOAD_PATH (images/) 
 *                 folder and return the path location.
 *
 * Description:    Moves an uploaded movie image file from the temporary server location
 *                 to the ML_UPLOAD_PATH (images/) folder IF a movie image file was uploaded
 *                 and returns the path location of the uploaded file by appending the file
 *                 name to the ML_UPLOAD_PATH (e.g. images/movie_image.png). IF a movie image
 *                 file was NOT uploaded, an empty string will be returned for the path.
 *
 * @return string  Path to movie image file IF a file was uploaded AND moved to the 
 *                 ML_UPLOAD_PATH (images/) folder, otherwise and empty string.
 */
function addMovieImageFileReturnPathLocation()
{
}