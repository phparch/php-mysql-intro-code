<?php
    require_once('Pet.php');
    require_once('Dog.php');
    require_once('Cat.php');
      
    // Create a pet, dog, and cat
    $my_pet = new Pet();
    $my_dog = new Dog();
    $my_cat = new Cat();
      
    // Set Pet's name and exercise
    $my_pet->setName("Gerald");
    $my_pet->exercise();
      
    echo '**********<br />';
      
    // Set Dog's name, exercise, and bark
    $my_dog->setName('Sparky');
    $my_dog->exercise();
    $my_dog->bark();
      
    echo '**********<br />';
      
    // Set Cat's name, exercise, and meow
    $my_cat->setName('Boo');
    $my_cat->exercise();
    $my_cat->meow();
?>