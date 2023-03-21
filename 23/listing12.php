// IF user does not exist, create an account for them
if (mysqli_num_rows($results) == 0)
{
    $salted_hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (`user_name`, `password_hash`) 
              VALUES (?, '$salted_hashed_password')";
    $results = parameterizedQuery($dbc, $query, 's', $user_name)
            or trigger_error(mysqli_error($dbc), E_USER_ERROR);

    // Direct the user to the login page
    echo "<h4><p class='text-success'>Thank you for signing up <strong>$user_name</strong>! "
         . "Your new account has been successfully created.<br/>"
         . "You're now ready to <a href='login.php'>log in</a>.</p></h4>";

    $show_sign_up_form = false;
}