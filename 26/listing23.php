<?php
require_once('StudentManager.php');

// Manage some Simpsons
$simpsons_manager = new StudentManager();

$simpsons = [];

$simpsons[] = [
   'first_name' => 'Bart',
   'last_name' => 'Simpson',
   'email' => 'kowabungadude@simpsons.com'
];

$simpsons[] = [
   'first_name' => 'Lisa',
   'last_name' => 'Simpson',
   'email' => 'lisa@simpsons.com'
];

$simpsons[] = [
   'first_name' => 'Marge',
   'last_name' => 'Simpson',
   'email' => 'marge@simpsons.com'
];

$simpsons[] = [
   'first_name' => 'Homer',
   'last_name' => 'Simpson',
   'email' => 'ilovedonuts@simpsons.com'
];

// Insert each Simpson into the students table
foreach ($simpsons as $simpson)
{
   echo "Creating a new entry for: "
      . $simpson['first_name'] . " " . $simpson['last_name']
      . " with email of: " . $simpson['email'] . "<br/>";

   $id = $simpsons_manager->create(
      $simpson['first_name'], $simpson['last_name'], $simpson['email']
   );

   echo $simpson['first_name'] . "'s id is: $id<br/><br/>";
}