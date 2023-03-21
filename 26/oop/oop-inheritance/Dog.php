<?php
    require_once('Pet.php');
    class Dog extends Pet
    {
        public function bark()
        {
            echo $this->name . ' is barking.<br />';
        }
    }
?>