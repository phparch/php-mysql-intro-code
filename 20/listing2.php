<?php
$username = 'movieguru';
$password = 'ilikemovies';

// IF Password OR Username are empty
//  OR Password  OR Username don't match
// send HTTP authentication headers
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
    || $_SERVER['PHP_AUTH_USER'] !== $username
    || $_SERVER['PHP_AUTH_PW'] !== $password) {

   header('HTTP/1.1 401 Unauthorized');
   header('WWW-Authenticate: Basic realm="Movies I Like"');
   $invalid_response = "<h2>Movies I Like</h2><h4>You must enter a "
                     . "valid username and password to access this page.</h4>";
   exit($invalid_response);
}