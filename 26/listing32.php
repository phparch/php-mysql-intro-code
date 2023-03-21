require_once('StudentManager.php');

// Manage some Simpsons
$simpsons_manager = new StudentManager();

$bart = $simpsons_manager->readById(1);

if ($bart)
{
    echo "Deleting " . $bart->getFirstName() . " " . $bart->getLastName() . "<br/>";

    if ($simpsons_manager->delete($bart->getId()) == 1)
    {
        echo "Successfully deleted " . $bart->getFirstName() . " " 
             . $bart->getLastName() . "<br/>";
    }
}