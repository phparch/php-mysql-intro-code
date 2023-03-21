<?php
    class Student
    {
        private $id;
        private $name;
        private $email;

        // Constructor  - if this is not defined, PHP creates a default constructor
        //              - if you create one, PHP will NOT create a default constructor
        public function __construct($id, $name, $email)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
        }

        // Getters
        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getEmail()
        {
            return $this->email;
        }
    }
?>