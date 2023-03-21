<?php
$username = 'movieguru';
$password = 'ilikemovies';

// IF Password OR Username are empty
//  OR Password  OR Username don't match
// send HTTP authentication headers
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
    || $_SERVER['PHP_AUTH_USER'] !== $username 
    || $_SERVER['PHP_AUTH_PW'] !== $password) {
   
   
   
}
