require_once('StudentManager.php');

// Manage some Simpsons
$simpsons_manager = new StudentManager();

$update_homer_to_maggie = $simpsons_manager->readById(4);

if ($update_homer_to_maggie)
{
    echo "First name: " . $update_homer_to_maggie->getFirstName() . "<br/>";
    echo "Last name: " . $update_homer_to_maggie->getLastName() . "<br/>";
    echo "Email: " . $update_homer_to_maggie->getEmail() . "<br/>";
    echo "<br/>";
}

if ($simpsons_manager->update(4,"Maggie", "Simpson", "maggie@simpsons.com") == 1)
{
    $update_homer_to_maggie = $simpsons_manager->readById(4);

    if ($update_homer_to_maggie)
    {
        echo "First name: " . $update_homer_to_maggie->getFirstName() . "<br/>";
        echo "Last name: " . $update_homer_to_maggie->getLastName() . "<br/>";
        echo "Email: " . $update_homer_to_maggie->getEmail() . "<br/>";
        echo "<br/>";
    }   
}