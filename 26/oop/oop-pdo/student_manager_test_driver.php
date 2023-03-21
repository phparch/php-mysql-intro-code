<?php
    require_once('StudentManager.php');

    // Manage some Simpsons
    $simpsons_manager = new StudentManager();

    $simpsons = array();

    $simpsons[] = array('first_name' => 'Bart',
            'last_name' => 'Simpson',
            'email'  => 'kowabungadude@simpsons.com');

    $simpsons[] = array('first_name' => 'Lisa',
            'last_name' => 'Simpson',
            'email'  => 'lisa@simpsons.com');

    $simpsons[] = array('first_name' => 'Marge',
            'last_name' => 'Simpson',
            'email'  => 'marge@simpsons.com');

    $simpsons[] = array('first_name' => 'Homer',
            'last_name' => 'Simpson',
            'email'  => 'ilovedonuts@simpsons.com');

            /*
    foreach ($simpsons as $simpson)
    {
        echo "Creating a new entry for: "
                . $simpson['first_name'] . " " . $simpson['last_name']
                . " with email of: " . $simpson['email'] . "<br/>";

        $id = $simpsons_manager->create($simpson['first_name'],
                $simpson['last_name'], $simpson['email']);

        echo $simpson['first_name'] . "'s id is: $id<br/><br/>";
    }
    */

    $the_simpsons = $simpsons_manager->readAll();

    foreach ($the_simpsons as $simpson)
    {
        echo "First name: " . $simpson->getFirstName() . "<br/>";
        echo "Last name: " . $simpson->getLastName() . "<br/>";
        echo "Email: " . $simpson->getEmail() . "<br/>";
        echo "<br/>";
    }

    $a_simpson = $simpsons_manager->readById(3);

    if ($a_simpson)
    {
        echo "First name: " . $a_simpson->getFirstName() . "<br/>";
        echo "Last name: " . $a_simpson->getLastName() . "<br/>";
        echo "Email: " . $a_simpson->getEmail() . "<br/>";
        echo "<br/>";
    }

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

    $bart = $simpsons_manager->readById(1);

    if ($bart)
    {
        echo "Deleting " . $bart->getFirstName() . " " . $bart->getLastName() . "<br/>";

        if ($simpsons_manager->delete($bart->getId()) == 1)
        {
            echo "Successfully deleted " . $bart->getFirstName() . " " . $bart->getLastName() . "<br/>";
        }
    }
