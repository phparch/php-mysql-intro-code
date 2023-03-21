<?php

require_once('StudentManager.php');

// Manage some Simpsons
$simpsons_manager = new StudentManager();

$the_simpsons = $simpsons_manager->readAll();

foreach ($the_simpsons as $simpson)
{
   echo "First name: " . $simpson->getFirstName() . "<br/>";
   echo "Last name: " . $simpson->getLastName() . "<br/>";
   echo "Email: " . $simpson->getEmail() . "<br/>";
   echo "<br/>";
}