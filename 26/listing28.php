require_once('StudentManager.php');

// Manage some Simpsons
$simpsons_manager = new StudentManager();

$a_simpson = $simpsons_manager->readById(3);

if ($a_simpson)
{
    echo "First name: " . $a_simpson->getFirstName() . "<br/>";
    echo "Last name: " . $a_simpson->getLastName() . "<br/>";
    echo "Email: " . $a_simpson->getEmail() . "<br/>";
    echo "<br/>";
}