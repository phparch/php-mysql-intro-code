<?php
    require_once('Pet.php');
    class Cat extends Pet
    {
        public function meow()
        {
            echo 'My cat ' . $this->name . ' is meowing.<br />';
        }
    }
?>