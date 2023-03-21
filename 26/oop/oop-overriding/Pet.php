<?php
    class Pet
    {
        protected $name;
          
        // Getters / Setters
        public function getName()
        {
            return $this->name;
        }
          
        public function setName($name)
        {
            $this->name = $name;
        }
          
        // Do some exercise!
        public function exercise()
        {
            echo 'Exercising my pet ' . $this->name . '.<br />';
        }
    }
?>