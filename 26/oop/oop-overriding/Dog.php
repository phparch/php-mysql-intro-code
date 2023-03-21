<?php
    require_once('Pet.php');
    class Dog extends Pet
    {
        public function bark()
        {
            echo $this->name . ' is barking.<br />';
        }
          
        // Do some dog exercise!
        public function exercise()
        {
            echo 'Walking my dog ' . $this->name . '.<br />';
        }
    }
?>